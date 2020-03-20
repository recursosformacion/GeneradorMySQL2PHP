<?php
namespace App\dao;



use service\DaoException;
use PDO;
use PDOStatement;

abstract class Daobase
{

    protected $pdo;
    private $modelo;
    private $objModelo;
    private $tabla;
    private $campoId;

    function __construct(PDO $connection,string $modelo)
    {
        $this->pdo = $connection;
        $this->modelo = $modelo;
        $this->objModelo = new $this->modelo();
        $this->tabla = $this->objModelo->getNombreTabla();
        $this->campoId = $this->objModelo->getNombreId();
    }

    /**
     * ecutar statement que requiere un retorno de clases
     *
     * @param PDOStatement $stmt
     * @return array
     */
    public function acceder(PDOStatement $stmt): array
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->modelo);
        return accederSQL($stmt);
    }

    /**
     * Ejecutar Statement que requiere retorno...plano
     *
     * @param PDOStatement $stmt
     * @return array
     */
    public function accederSQL(PDOStatement $stmt): array
    {
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Ejecutar statement que no requiere retorno (delete, update, insert)
     *
     * @param PDOStatement $stmt
     */
    public function lanzarSQL(PDOStatement $stmt): void
    {
        $stmt->execute();
        return;
    }

    /**
     * Devolver un listado completo de todos los objetos de la tabla
     *
     * @return array
     */
    public function listAll(): array
    {
        $stmt = $this->pdo->prepare(static::SELECT_ALL);
        return $this->acceder($stmt);
    }
    
    /**
     * Devolver un listado de todos los objetos de la tabla que cumplen 
     * con la condicion where
     * where string con todas las condiciones que se han de cumplir
     * 
     *
     * @return array
     */
    public function listConWhere(string $where): array
    {
        $sql = static::SELECT_WHERE; // no se puede utilizar bind_values en cualquier sitio!
        $sql = str_replace(':where', $where, $sql);
        $stmt = $this->pdo->prepare($sql);
        return $this->acceder($stmt);
        
    }
    
    /**
     * Devolver un objeto de la tabla desde la PRIMARY KEY
     * 
     * id : Clave de acceso a utilizar
     * DaoException : Si no se encuentra el registro, o se encuentra mas de uno, se genera excepcion
     *              : Tambien se genera excepcion, si hay excion SQL
     *
     * @return array
     */
    public function listPorId(int $id)
    {
        try {
            $stmt = $this->pdo->prepare(static::SELECT_UNO);
            $stmt->bindValue(':id', $id);
            $retorno = $this->acceder($stmt);
            if (null != $retorno && count($retorno) > 0) {
                return $retorno[0];
            } else {
                if ($id != 0)
                    throw new DaoException("No se encontro registro en " . $this->modelo . " para " . $id, 0, null);
                    return null;
            }
        } catch (\Exception $e) {
            throw new DaoException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * Identico a rutinas anteriores, pero se genera la salida en JSON
     *
     * @return string
     */
    public function listJson(): string
    {
        $stmt = $this->pdo->prepare(static::SELECT_ALL);       
        return $this->salidaJson($stmt);
    }
    
    public function salidaJson($stmt):string
    {
        $stmt->execute();
        $userData = array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $userData[$this->tabla][] = $row;
        }
        return json_encode($userData);
    }    
    public function listConWhereJson($where): string
    {
        $sql = static::SELECT_WHERE; // no se puede utilizar bind_values en cualquier sitio!
        $sql = str_replace(':where', $where, $sql);
        // var_dump($sql);
        $stmt = $this->pdo->prepare($sql);
        return $this->salidaJson($stmt);
    }  

    /**
     * 
     * @param  objeto       Recibe un objeto del modelo correspondiente, y ese objeto se actualiza
     * @throws DaoException Lanza excepcion como resultado de una excepcion SQL
     *                      Se construye una alternativa para poder visualizar la consulta
     * @return bool
     */
    public function update($objeto): bool
    {
        try {
            $stmt = $this->montaBind(static::ACTUALIZA, $objeto);
            $stmt->execute();
        } catch (\Exception $e) {
            $paraDebug = $this->montaDebug(static::ACTUALIZA, $objeto);
            throw new DaoException($e->getMessage() . "->" . $paraDebug, (int) $e->getCode());
        }
        $upd = $stmt->rowCount();
        if ($upd != 1) {
            $paraDebug = $this->montaDebug(static::ACTUALIZA, $objeto);
            throw new DaoException("Actualizacion erronea-> (Afecta a: $upd - " . $paraDebug, 999999);
        }
        return $upd;
    }

    /**
     * 
     * @param  objeto       Recibe un objeto que se va a insertar en la base de datos
     * @throws DaoException Se genera excepcion si hay error SQL o no se realiza el INSERT
     * @return bool
     */
    public function inserta($objeto): bool
    {
        try {
            $stmt = $this->montaBind(static::INSERTAR, $objeto);
            $stmt->execute();
            $_SESSION['last_id'] = $this->pdo->lastInsertId();
            $objeto->setId($_SESSION['last_id']);
            $upd = $stmt->rowCount();
            if ($upd != 1) {
                throw new DaoException("Actualizacion erronea->" . $paraDebug, 999999);
            }
            return $upd;
        } catch (\Exception $e) {
            $paraDebug = $this->montaDebug(static::INSERTAR, $objeto);
            throw new DaoException($e->getMessage() . "->" . $paraDebug, (int) $e->getCode());
        }
    }

    /**
     * 
     * @param  objeto       Se recibe un objeto que se eliminara de la base de datos
     * @throws DaoException Se genera excepcion si hay error SQL o no se realiza el DELETE
     * @return bool
     */
    public function borra($objeto): bool
    {
        try {
            $stmt = $this->montaBindDel(static::DELETE, $objeto);
            $stmt->execute();
            $upd = $stmt->rowCount();
            if ($upd != 1) {
                throw new DaoException("Borrado erroneo->" . $paraDebug, 999999);
            }
            return $upd;
        } catch (\Exception $e) {
            $paraDebug = $this->montaDebug(static::DELETE, $objeto);
            throw new DaoException($e->getMessage() . "->" . $paraDebug, (int) $e->getCode());
        }
    }

    public function sql($sql): array
    {
        $stmt = $this->pdo->prepare($sql);
        return $this->accederSQL($stmt);
    }

    public function resetAutoincrement(): void
    {
        $modelo = new $this->modelo();
        $tabla = $modelo->getNombreTabla();
        $campoId = $modelo->getNombreId();
        if ($campoId == "")
            return; // si no tiene autoincrement
        $stmt = $this->pdo->prepare("SELECT MAX($campoId) as max FROM $tabla");
        $respuesta = $this->accederSQL($stmt);

        $max = $respuesta[0]['max'];
        if (NULL === $max)
            $max = 0;
        $stmt = $this->pdo->prepare("ALTER TABLE $tabla AUTO_INCREMENT = $max ");
        $this->lanzarSQL($stmt);
    }

    
    public function beginTransaction():void
    {
        try {
            $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // Activar transacciones
            $this->pdo->beginTransaction();
        } catch (\Exception $e) {
            throw new DaoException($e->getMessage() . "->beginTransaction", (int) $e->getCode());
        }
    }
    
    public function commit():void
    {
        try {
            $this->pdo->commit();
            $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1); // Activar transacciones
        } catch (\Exception $e) {
            throw new DaoException($e->getMessage() . "->commit", (int) $e->getCode());
        }
    }
    
    public function rollback():void
    {
        if ($this->pdo->inTransaction()) {
            try {
                $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1); // Activar transacciones
                $this->pdo->rollback();
            } catch (\Exception $e) {
                throw new DaoException($e->getFile() . "," . $e->getLine() . " - " . $e->getMessage() . "->endTransaction", (int) $e->getCode());
            }
        }
    }
    
    public abstract function montaBind(string $orden, $modelo);

    public abstract function montaBindDel(string $orden, $modelo);

    // public abstract function montaBind(string $orden, ModeloBase $modelo); ******************************************
    // public abstract function montaBindDel(string $orden, ModeloBase $modelo); ****************************************
}


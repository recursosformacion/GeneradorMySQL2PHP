<?php
namespace App\dao;

require_once (dirname(dirname(__FILE__)) . '/service/Conexion.php');
require_once (dirname(dirname(__FILE__)) . '/excepciones/DaoException.php');

use excepciones\DaoException;
use App\modelos\ModeloBase;
use App\service\Conexion;
use PDO;
use PDOStatement;

abstract class Daobase
{

    protected $pdo;

    private $modelo;

    private $objModelo;

    private $tabla;

    private $campoId;

    function __construct(string $modelo)
    {
        $this->pdo = Conexion::getInstance();
        $this->modelo = $modelo;
        $this->objModelo = new $this->modelo();
        $this->tabla = $this->objModelo->getNombreTabla();
        $this->campoId = $this->objModelo->getNombreId();
    }

    /**
     *
     * @param
     *            objeto Recibe un objeto del modelo correspondiente, y ese objeto se actualiza
     * @throws DaoException Lanza excepcion como resultado de una excepcion SQL
     *         Se construye una alternativa para poder visualizar la consulta
     * @return bool
     */
    public function update(object $objeto): bool
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
     * @param
     *            objeto Recibe un objeto que se va a insertar en la base de datos
     * @throws DaoException Se genera excepcion si hay error SQL o no se realiza el INSERT
     * @return bool
     */
    public function inserta(object $objeto): bool
    {
        try {
            $stmt = $this->montaBind(static::INSERTAR, $objeto);
            $stmt->execute();
            $_SESSION['last_id'] = $this->pdo->lastInsertId();
            $objeto->setId($_SESSION['last_id']);
            var_dump($objeto);
            $upd = $stmt->rowCount();
            if ($upd != 1) {
                $paraDebug = $this->montaDebug(static::INSERTAR, $objeto);
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
     * @param
     *            objeto Se recibe un objeto que se eliminara de la base de datos
     * @throws DaoException Se genera excepcion si hay error SQL o no se realiza el DELETE
     * @return bool
     */
    public function borra(object $objeto): bool
    {
        try {
            $stmt = $this->montaBindDel(static::DELETE, $objeto);
            $stmt->execute();
            $upd = $stmt->rowCount();
            if ($upd != 1) {
                $paraDebug = $this->montaDebug(static::DELETE, $objeto);
                throw new DaoException("Borrado erroneo->" . $paraDebug, 999999);
            }
            return $upd;
        } catch (\Exception $e) {
            $paraDebug = $this->montaDebug(static::DELETE, $objeto);
            throw new DaoException($e->getMessage() . "->" . $paraDebug, (int) $e->getCode());
        }
    }

    /**
     * Devolver un objeto de la tabla desde la PRIMARY KEY
     *
     * id : Clave de acceso a utilizar
     * DaoException : Si no se encuentra el registro, o se encuentra mas de uno, se genera excepcion
     * : Tambien se genera excepcion, si hay excion SQL
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
     * Identico a rutinas anteriores, pero se genera la salida en JSON
     *
     * @return string
     */
    public function listJson(): string
    {
        $stmt = $this->pdo->prepare(static::SELECT_ALL);
        return $this->salidaJson($stmt);
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

    public function listConWhereJson(string $where): string
    {
        $sql = static::SELECT_WHERE; // no se puede utilizar bind_values en cualquier sitio!
        $sql = str_replace(':where', $where, $sql);
        $stmt = $this->pdo->prepare($sql);
        return $this->salidaJson($stmt);
    }

    /**
     * Funciones de utilidad
     */

    /**
     * Realiza el acceso y retorna con el Json de lo obtenido
     *
     * @param PDOStatement $stmt
     * @return string
     */
    public function salidaJson(PDOStatement $stmt): string
    {
        $stmt->execute();
        $userData = array();
        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // $userData[$this->tabla][] = $row;
            $userData[$i] = $row;
            $i ++;
        }
        return json_encode($userData);
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
        return $this->accederSQL($stmt);
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
     * Devolucion de conjunto de clases del modelo, con la SQL personalizada
     * aunque habra de ser SELECT
     *
     * @param string $sql
     * @return array
     */
    public function sql(string $sql): array
    {
        $stmt = $this->pdo->prepare($sql);
        return $this->accederSQL($stmt);
    }

    /**
     * ************************************************************************
     * Funciones opcionales
     */
    public function resetAutoincrement(): void
    {
        $max = $this->maxIndex();
        if (NULL === $max)
            $max = 0;
        $stmt = $this->pdo->prepare("ALTER TABLE $this->tabla AUTO_INCREMENT = $max ");
        $this->lanzarSQL($stmt);
    }

    public function maxIndex(): int
    {
        if ($this->campoId == "")
            return 0; // si no tiene autoincrement
        $stmt = $this->pdo->prepare("SELECT MAX($this->campoId ) as max FROM $this->tabla");
        $respuesta = $this->accederSQL($stmt);
        return $respuesta[0]['max'];
    }

    public function beginTransaction(): void
    {
        try {
            $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // Activar transacciones
            $this->pdo->beginTransaction();
        } catch (\Exception $e) {
            throw new DaoException($e->getMessage() . "->beginTransaction", (int) $e->getCode());
        }
    }

    public function commit(): void
    {
        try {
            $this->pdo->commit();
            $this->pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1); // Activar transacciones
        } catch (\Exception $e) {
            throw new DaoException($e->getMessage() . "->commit", (int) $e->getCode());
        }
    }

    public function rollback(): void
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

    public function obtenSelect(array $campos, $current, $where = null): string
    {
        $sql = '';
        $orden = '';
        foreach ($campos as $campo) {
            if ($sql != '') {
                $sql .= ',';
                if ($orden == '')
                    $orden = $campo; // el segundo campo, es para orden
            }
            $sql .= $campo;
        }
        $auxWhere = (null == $where) ? '' : ' WHERE ' . $where . ' ';
        $sql = 'SELECT ' . $sql . ' FROM ' . $this->tabla . $auxWhere . ' ORDER BY ' . $orden;
        ;
        $lista = $this->sql($sql);
        return montaSelect($campos, $lista, $current);
    }

    public function obtenSelectPosicionado(array $campos, $current): string // utilizable cuando solo se ha de presentar la posicion actual; listados, borrado de elemento ...
    {
        $lista = [];
        $lista[] = $this->listPorId($current);
        return montaSelect($campos, $lista, $current);
    }

    public function obtenSelectxPartes(array $campos, $current, $where): string
    {
        /*
         * $lista=$this->listConWhere($where);
         * return montaSelect($campos, $lista, $current);
         */
        return $this->obtenSelect($campos, $current, $where);
    }

    function montaSelect(array $campos, array $lista, $current): string
    {
        $campo1 = "get" . ucfirst($campos[0]);
        $campo2 = "get" . ucfirst($campos[1]);
        $salida = "";
        foreach ($lista as $elemento) {
            if ($elemento instanceof ModeloBase) {
                $salida .= '<option value="' . $elemento->$campo1() . '" ';
                if ($elemento->$campo1() == $current) {
                    $salida .= " selected ";
                }
                $salida .= '>' . $elemento->$campo2() . '</option>';
            } else {
                $salida .= '<option value="' . $elemento[$campos[0]] . '" ';
                if ($elemento[$campos[0]] == $current) {
                    $salida .= " selected ";
                }
                $salida .= '>' . $elemento[$campos[1]] . '</option>';
            }
        }
        return $salida;
    }

    /**
     * ************************************************************************************************
     * Funciones abstractas resueltas en el hijo
     *
     * @param string $orden
     * @param object $modelo
     */
    public abstract function montaBind(string $orden, object $modelo);

    public abstract function montaBindDel(string $orden, $modelo);

    public abstract function montaDebug(string $orden, $modelo);

    // public abstract function montaBind(string $orden, ModeloBase $modelo); ******************************************
    // public abstract function montaBindDel(string $orden, ModeloBase $modelo); ****************************************
}


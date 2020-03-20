<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoProveedor
* File Name:        DaoProveedor.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_proveedor
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoProveedor"
class DaoProveedor extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM tipo_proveedor  ORDER BY tp_nombre_tipo";
	const SELECT_WHERE = "SELECT * FROM FROM tipo_proveedor WHERE :where  ORDER BY tp_nombre_tipo";
	const SELECT_UNO = "SELECT * FROM  tipo_proveedor  WHERE id_tipoproveedor = :id";
	const INSERTAR = "INSERT into tipo_proveedor values (id_tipoproveedor,tp_nombre_tipo,tp_descripcion_tipo,)";
	const ACTUALIZA = "UPDATE tipo_proveedor  set tp_nombre_tipo= :tp_nombre_tipo,tp_descripcion_tipo= :tp_descripcion_tipo,
                                        WHERE id_tipoproveedor = :id ";
	const DELETE = "DELETE FROM tipo_proveedor WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Tipo_proveedor");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_tipoproveedor', $modelo->getId_tipoproveedor ());
		$stmt->bindValue (':tp_nombre_tipo', $modelo->getTp_nombre_tipo ());
		$stmt->bindValue (':tp_descripcion_tipo', $modelo->getTp_descripcion_tipo ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_tipoproveedor ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_tipoproveedor', $modelo->getId_tipoproveedor (),$stmt);
		$stmt = str_replace (':tp_nombre_tipo', $modelo->getTp_nombre_tipo (),$stmt);
		$stmt = str_replace (':tp_descripcion_tipo', $modelo->getTp_descripcion_tipo (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_tipoproveedor (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoProveedor"
?>
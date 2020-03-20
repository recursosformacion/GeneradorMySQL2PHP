<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoFacturapro
* File Name:        DaoFacturapro.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_facturapro
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoFacturapro"
class DaoFacturapro extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM tipo_facturapro  ORDER BY tfp_nombre";
	const SELECT_WHERE = "SELECT * FROM FROM tipo_facturapro WHERE :where  ORDER BY tfp_nombre";
	const SELECT_UNO = "SELECT * FROM  tipo_facturapro  WHERE id_tipofacturapro = :id";
	const INSERTAR = "INSERT into tipo_facturapro values (id_tipofacturapro,tfp_nombre,)";
	const ACTUALIZA = "UPDATE tipo_facturapro  set tfp_nombre= :tfp_nombre,
                                        WHERE id_tipofacturapro = :id ";
	const DELETE = "DELETE FROM tipo_facturapro WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Tipo_facturapro");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_tipofacturapro', $modelo->getId_tipofacturapro ());
		$stmt->bindValue (':tfp_nombre', $modelo->getTfp_nombre ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_tipofacturapro ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_tipofacturapro', $modelo->getId_tipofacturapro (),$stmt);
		$stmt = str_replace (':tfp_nombre', $modelo->getTfp_nombre (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_tipofacturapro (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoFacturapro"
?>
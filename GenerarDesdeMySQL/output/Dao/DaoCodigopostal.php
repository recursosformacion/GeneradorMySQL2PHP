<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoCodigopostal
* File Name:        DaoCodigopostal.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_codigopostal
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoCodigopostal"
class DaoCodigopostal extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM cp_codigopostal  ORDER BY cpcod_cpostal";
	const SELECT_WHERE = "SELECT * FROM FROM cp_codigopostal WHERE :where  ORDER BY cpcod_cpostal";
	const SELECT_UNO = "SELECT * FROM  cp_codigopostal  WHERE id = :id";
	const INSERTAR = "INSERT into cp_codigopostal values (id,cpcod_cpostal,cppob_id,cppro_id,)";
	const ACTUALIZA = "UPDATE cp_codigopostal  set cpcod_cpostal= :cpcod_cpostal,cppob_id= :cppob_id,cppro_id= :cppro_id,
                                        WHERE id = :id ";
	const DELETE = "DELETE FROM cp_codigopostal WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Cp_codigopostal");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId ());
		$stmt->bindValue (':cpcod_cpostal', $modelo->getCpcod_cpostal ());
		$stmt->bindValue (':cppob_id', $modelo->getCppob_id ());
		$stmt->bindValue (':cppro_id', $modelo->getCppro_id ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id', $modelo->getId (),$stmt);
		$stmt = str_replace (':cpcod_cpostal', $modelo->getCpcod_cpostal (),$stmt);
		$stmt = str_replace (':cppob_id', $modelo->getCppob_id (),$stmt);
		$stmt = str_replace (':cppro_id', $modelo->getCppro_id (),$stmt);
		$stmt = str_replace (':id', $modelo->getId (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoCodigopostal"
?>
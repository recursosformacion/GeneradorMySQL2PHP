<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoProvincias
* File Name:        DaoProvincias.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_provincias
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoProvincias"
class DaoProvincias extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM cp_provincias  ORDER BY cppro_nombre";
	const SELECT_WHERE = "SELECT * FROM FROM cp_provincias WHERE :where  ORDER BY cppro_nombre";
	const SELECT_UNO = "SELECT * FROM  cp_provincias  WHERE cppro_id = :id";
	const INSERTAR = "INSERT into cp_provincias values (cppro_id,cppro_nombre,cppro_codca,cppro_capital,)";
	const ACTUALIZA = "UPDATE cp_provincias  set cppro_nombre= :cppro_nombre,cppro_codca= :cppro_codca,cppro_capital= :cppro_capital,
                                        WHERE cppro_id = :id ";
	const DELETE = "DELETE FROM cp_provincias WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Cp_provincias");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':cppro_id', $modelo->getCppro_id ());
		$stmt->bindValue (':cppro_nombre', $modelo->getCppro_nombre ());
		$stmt->bindValue (':cppro_codca', $modelo->getCppro_codca ());
		$stmt->bindValue (':cppro_capital', $modelo->getCppro_capital ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getCppro_id ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':cppro_id', $modelo->getCppro_id (),$stmt);
		$stmt = str_replace (':cppro_nombre', $modelo->getCppro_nombre (),$stmt);
		$stmt = str_replace (':cppro_codca', $modelo->getCppro_codca (),$stmt);
		$stmt = str_replace (':cppro_capital', $modelo->getCppro_capital (),$stmt);
		$stmt = str_replace (':id', $modelo->getCppro_id (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoProvincias"
?>
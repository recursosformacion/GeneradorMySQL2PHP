<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoPais
* File Name:        DaoPais.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_pais
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoPais"
class DaoPais extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM cp_pais  ORDER BY iso2";
	const SELECT_WHERE = "SELECT * FROM FROM cp_pais WHERE :where  ORDER BY iso2";
	const SELECT_UNO = "SELECT * FROM  cp_pais  WHERE country_id = :id";
	const INSERTAR = "INSERT into cp_pais values (country_id,iso2,short_name,spanish_name,calling_code,cctld,iso3,long_name,numcode,un_member,)";
	const ACTUALIZA = "UPDATE cp_pais  set iso2= :iso2,short_name= :short_name,spanish_name= :spanish_name,calling_code= :calling_code,cctld= :cctld,iso3= :iso3,long_name= :long_name,numcode= :numcode,un_member= :un_member,
                                        WHERE country_id = :id ";
	const DELETE = "DELETE FROM cp_pais WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Cp_pais");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':country_id', $modelo->getCountry_id ());
		$stmt->bindValue (':iso2', $modelo->getIso2 ());
		$stmt->bindValue (':short_name', $modelo->getShort_name ());
		$stmt->bindValue (':spanish_name', $modelo->getSpanish_name ());
		$stmt->bindValue (':calling_code', $modelo->getCalling_code ());
		$stmt->bindValue (':cctld', $modelo->getCctld ());
		$stmt->bindValue (':iso3', $modelo->getIso3 ());
		$stmt->bindValue (':long_name', $modelo->getLong_name ());
		$stmt->bindValue (':numcode', $modelo->getNumcode ());
		$stmt->bindValue (':un_member', $modelo->getUn_member ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getCountry_id ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':country_id', $modelo->getCountry_id (),$stmt);
		$stmt = str_replace (':iso2', $modelo->getIso2 (),$stmt);
		$stmt = str_replace (':short_name', $modelo->getShort_name (),$stmt);
		$stmt = str_replace (':spanish_name', $modelo->getSpanish_name (),$stmt);
		$stmt = str_replace (':calling_code', $modelo->getCalling_code (),$stmt);
		$stmt = str_replace (':cctld', $modelo->getCctld (),$stmt);
		$stmt = str_replace (':iso3', $modelo->getIso3 (),$stmt);
		$stmt = str_replace (':long_name', $modelo->getLong_name (),$stmt);
		$stmt = str_replace (':numcode', $modelo->getNumcode (),$stmt);
		$stmt = str_replace (':un_member', $modelo->getUn_member (),$stmt);
		$stmt = str_replace (':id', $modelo->getCountry_id (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoPais"
?>
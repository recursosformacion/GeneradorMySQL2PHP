<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoCustomer
* File Name:        DaoCustomer.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     customer
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoCustomer"
class DaoCustomer extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM customer  ORDER BY password";
	const SELECT_WHERE = "SELECT * FROM FROM customer WHERE :where  ORDER BY password";
	const SELECT_UNO = "SELECT * FROM  customer  WHERE id = :id";
	const INSERTAR = "INSERT into customer values (id,password,token,user_name,)";
	const ACTUALIZA = "UPDATE customer  set password= :password,token= :token,user_name= :user_name,
                                        WHERE id = :id ";
	const DELETE = "DELETE FROM customer WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Customer");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId ());
		$stmt->bindValue (':password', $modelo->getPassword ());
		$stmt->bindValue (':token', $modelo->getToken ());
		$stmt->bindValue (':user_name', $modelo->getUser_name ());
		
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
		$stmt = str_replace (':password', $modelo->getPassword (),$stmt);
		$stmt = str_replace (':token', $modelo->getToken (),$stmt);
		$stmt = str_replace (':user_name', $modelo->getUser_name (),$stmt);
		$stmt = str_replace (':id', $modelo->getId (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoCustomer"
?>
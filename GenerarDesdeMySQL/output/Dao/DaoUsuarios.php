<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoUsuarios
* File Name:        DaoUsuarios.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     co_usuarios
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoUsuarios"
class DaoUsuarios extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM co_usuarios  ORDER BY cou_nombre";
	const SELECT_WHERE = "SELECT * FROM FROM co_usuarios WHERE :where  ORDER BY cou_nombre";
	const SELECT_UNO = "SELECT * FROM  co_usuarios  WHERE id_usuario = :id";
	const INSERTAR = "INSERT into co_usuarios values (id_usuario,cou_nombre,cou_mnemonico,cou_mail,cou_password,)";
	const ACTUALIZA = "UPDATE co_usuarios  set cou_nombre= :cou_nombre,cou_mnemonico= :cou_mnemonico,cou_mail= :cou_mail,cou_password= :cou_password,
                                        WHERE id_usuario = :id ";
	const DELETE = "DELETE FROM co_usuarios WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Co_usuarios");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_usuario', $modelo->getId_usuario ());
		$stmt->bindValue (':cou_nombre', $modelo->getCou_nombre ());
		$stmt->bindValue (':cou_mnemonico', $modelo->getCou_mnemonico ());
		$stmt->bindValue (':cou_mail', $modelo->getCou_mail ());
		$stmt->bindValue (':cou_password', $modelo->getCou_password ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_usuario ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_usuario', $modelo->getId_usuario (),$stmt);
		$stmt = str_replace (':cou_nombre', $modelo->getCou_nombre (),$stmt);
		$stmt = str_replace (':cou_mnemonico', $modelo->getCou_mnemonico (),$stmt);
		$stmt = str_replace (':cou_mail', $modelo->getCou_mail (),$stmt);
		$stmt = str_replace (':cou_password', $modelo->getCou_password (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_usuario (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoUsuarios"
?>
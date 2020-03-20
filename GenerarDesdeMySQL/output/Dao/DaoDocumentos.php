<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoDocumentos
* File Name:        DaoDocumentos.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     img_documentos
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoDocumentos"
class DaoDocumentos extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM img_documentos  ORDER BY imgd_relacion";
	const SELECT_WHERE = "SELECT * FROM FROM img_documentos WHERE :where  ORDER BY imgd_relacion";
	const SELECT_UNO = "SELECT * FROM  img_documentos  WHERE id_documentos = :id";
	const INSERTAR = "INSERT into img_documentos values (id_documentos,imgd_relacion,imgd_identificador,imgd_clasificador,imgd_path,imgd_descripcion,imgd_usuario,imgd_ult_access,)";
	const ACTUALIZA = "UPDATE img_documentos  set imgd_relacion= :imgd_relacion,imgd_identificador= :imgd_identificador,imgd_clasificador= :imgd_clasificador,imgd_path= :imgd_path,imgd_descripcion= :imgd_descripcion,imgd_usuario= :imgd_usuario,imgd_ult_access= :imgd_ult_access,
                                        WHERE id_documentos = :id ";
	const DELETE = "DELETE FROM img_documentos WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Img_documentos");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_documentos', $modelo->getId_documentos ());
		$stmt->bindValue (':imgd_relacion', $modelo->getImgd_relacion ());
		$stmt->bindValue (':imgd_identificador', $modelo->getImgd_identificador ());
		$stmt->bindValue (':imgd_clasificador', $modelo->getImgd_clasificador ());
		$stmt->bindValue (':imgd_path', $modelo->getImgd_path ());
		$stmt->bindValue (':imgd_descripcion', $modelo->getImgd_descripcion ());
		$stmt->bindValue (':imgd_usuario', $modelo->getImgd_usuario ());
		$stmt->bindValue (':imgd_ult_access', $modelo->getImgd_ult_access ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_documentos ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_documentos', $modelo->getId_documentos (),$stmt);
		$stmt = str_replace (':imgd_relacion', $modelo->getImgd_relacion (),$stmt);
		$stmt = str_replace (':imgd_identificador', $modelo->getImgd_identificador (),$stmt);
		$stmt = str_replace (':imgd_clasificador', $modelo->getImgd_clasificador (),$stmt);
		$stmt = str_replace (':imgd_path', $modelo->getImgd_path (),$stmt);
		$stmt = str_replace (':imgd_descripcion', $modelo->getImgd_descripcion (),$stmt);
		$stmt = str_replace (':imgd_usuario', $modelo->getImgd_usuario (),$stmt);
		$stmt = str_replace (':imgd_ult_access', $modelo->getImgd_ult_access (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_documentos (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoDocumentos"
?>
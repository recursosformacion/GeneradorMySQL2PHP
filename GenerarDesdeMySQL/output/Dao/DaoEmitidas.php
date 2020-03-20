<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoEmitidas
* File Name:        DaoEmitidas.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     facturas_emitidas
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoEmitidas"
class DaoEmitidas extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM facturas_emitidas  ORDER BY fe_identificador";
	const SELECT_WHERE = "SELECT * FROM FROM facturas_emitidas WHERE :where  ORDER BY fe_identificador";
	const SELECT_UNO = "SELECT * FROM  facturas_emitidas  WHERE id_facturas = :id";
	const INSERTAR = "INSERT into facturas_emitidas values (id_facturas,fe_identificador,fe_fecha,id_cliente,fe_tipofactura,fe_importebase,fe_porretencion,fe_poriva,fe_vencimiento,fe_comentarios,)";
	const ACTUALIZA = "UPDATE facturas_emitidas  set fe_identificador= :fe_identificador,fe_fecha= :fe_fecha,id_cliente= :id_cliente,fe_tipofactura= :fe_tipofactura,fe_importebase= :fe_importebase,fe_porretencion= :fe_porretencion,fe_poriva= :fe_poriva,fe_vencimiento= :fe_vencimiento,fe_comentarios= :fe_comentarios,
                                        WHERE id_facturas = :id ";
	const DELETE = "DELETE FROM facturas_emitidas WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Facturas_emitidas");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_facturas', $modelo->getId_facturas ());
		$stmt->bindValue (':fe_identificador', $modelo->getFe_identificador ());
		$stmt->bindValue (':fe_fecha', $modelo->getFe_fecha ());
		$stmt->bindValue (':id_cliente', $modelo->getId_cliente ());
		$stmt->bindValue (':fe_tipofactura', $modelo->getFe_tipofactura ());
		$stmt->bindValue (':fe_importebase', $modelo->getFe_importebase ());
		$stmt->bindValue (':fe_porretencion', $modelo->getFe_porretencion ());
		$stmt->bindValue (':fe_poriva', $modelo->getFe_poriva ());
		$stmt->bindValue (':fe_vencimiento', $modelo->getFe_vencimiento ());
		$stmt->bindValue (':fe_comentarios', $modelo->getFe_comentarios ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_facturas ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_facturas', $modelo->getId_facturas (),$stmt);
		$stmt = str_replace (':fe_identificador', $modelo->getFe_identificador (),$stmt);
		$stmt = str_replace (':fe_fecha', $modelo->getFe_fecha (),$stmt);
		$stmt = str_replace (':id_cliente', $modelo->getId_cliente (),$stmt);
		$stmt = str_replace (':fe_tipofactura', $modelo->getFe_tipofactura (),$stmt);
		$stmt = str_replace (':fe_importebase', $modelo->getFe_importebase (),$stmt);
		$stmt = str_replace (':fe_porretencion', $modelo->getFe_porretencion (),$stmt);
		$stmt = str_replace (':fe_poriva', $modelo->getFe_poriva (),$stmt);
		$stmt = str_replace (':fe_vencimiento', $modelo->getFe_vencimiento (),$stmt);
		$stmt = str_replace (':fe_comentarios', $modelo->getFe_comentarios (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_facturas (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoEmitidas"
?>
<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoRecibidas
* File Name:        DaoRecibidas.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     facturas_recibidas
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoRecibidas"
class DaoRecibidas extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM facturas_recibidas  ORDER BY fr_identificador";
	const SELECT_WHERE = "SELECT * FROM FROM facturas_recibidas WHERE :where  ORDER BY fr_identificador";
	const SELECT_UNO = "SELECT * FROM  facturas_recibidas  WHERE id_facturas = :id";
	const INSERTAR = "INSERT into facturas_recibidas values (id_facturas,fr_identificador,fr_fecha,id_proveedor,fr_importebase,fr_porrecargoequiv,fr_poriva,fr_vencimiento,fr_comentarios,)";
	const ACTUALIZA = "UPDATE facturas_recibidas  set fr_identificador= :fr_identificador,fr_fecha= :fr_fecha,id_proveedor= :id_proveedor,fr_importebase= :fr_importebase,fr_porrecargoequiv= :fr_porrecargoequiv,fr_poriva= :fr_poriva,fr_vencimiento= :fr_vencimiento,fr_comentarios= :fr_comentarios,
                                        WHERE id_facturas = :id ";
	const DELETE = "DELETE FROM facturas_recibidas WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Facturas_recibidas");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_facturas', $modelo->getId_facturas ());
		$stmt->bindValue (':fr_identificador', $modelo->getFr_identificador ());
		$stmt->bindValue (':fr_fecha', $modelo->getFr_fecha ());
		$stmt->bindValue (':id_proveedor', $modelo->getId_proveedor ());
		$stmt->bindValue (':fr_importebase', $modelo->getFr_importebase ());
		$stmt->bindValue (':fr_porrecargoequiv', $modelo->getFr_porrecargoequiv ());
		$stmt->bindValue (':fr_poriva', $modelo->getFr_poriva ());
		$stmt->bindValue (':fr_vencimiento', $modelo->getFr_vencimiento ());
		$stmt->bindValue (':fr_comentarios', $modelo->getFr_comentarios ());
		
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
		$stmt = str_replace (':fr_identificador', $modelo->getFr_identificador (),$stmt);
		$stmt = str_replace (':fr_fecha', $modelo->getFr_fecha (),$stmt);
		$stmt = str_replace (':id_proveedor', $modelo->getId_proveedor (),$stmt);
		$stmt = str_replace (':fr_importebase', $modelo->getFr_importebase (),$stmt);
		$stmt = str_replace (':fr_porrecargoequiv', $modelo->getFr_porrecargoequiv (),$stmt);
		$stmt = str_replace (':fr_poriva', $modelo->getFr_poriva (),$stmt);
		$stmt = str_replace (':fr_vencimiento', $modelo->getFr_vencimiento (),$stmt);
		$stmt = str_replace (':fr_comentarios', $modelo->getFr_comentarios (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_facturas (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoRecibidas"
?>
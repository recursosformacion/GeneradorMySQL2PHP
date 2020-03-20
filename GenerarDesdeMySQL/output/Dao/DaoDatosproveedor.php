<?php
declare (strict_types = 1);
namespace App\dao;


/*******************************************************************************
* Class Name:       DaoDatosproveedor
* File Name:        DaoDatosproveedor.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     datosproveedor
*   - in Database:  contabilidadautonomos
* Created by: Daoclass 
********************************************************************************/

// Files required by class:
require_once ("DaoBase.php");

use PDOStatement;
// Begin Class "DaoDatosproveedor"
class DaoDatosproveedor extends DaoBase{
	
	// ************ Declaracion de variables
	const SELECT_ALL = "SELECT * FROM datosproveedor  ORDER BY dp_nombre";
	const SELECT_WHERE = "SELECT * FROM FROM datosproveedor WHERE :where  ORDER BY dp_nombre";
	const SELECT_UNO = "SELECT * FROM  datosproveedor  WHERE id_proveedor = :id";
	const INSERTAR = "INSERT into datosproveedor values (id_proveedor,dp_nombre,dp_direccion,dp_cpostal,dp_poblacion,dp_tipoproveedor,dp_correoelectronico,dp_idfiscal,)";
	const ACTUALIZA = "UPDATE datosproveedor  set dp_nombre= :dp_nombre,dp_direccion= :dp_direccion,dp_cpostal= :dp_cpostal,dp_poblacion= :dp_poblacion,dp_tipoproveedor= :dp_tipoproveedor,dp_correoelectronico= :dp_correoelectronico,dp_idfiscal= :dp_idfiscal,
                                        WHERE id_proveedor = :id ";
	const DELETE = "DELETE FROM datosproveedor WHERE cpcoa_id = :id";
	
	
	// Class Constructor
	public function __construct () {
		parent::__construct ($connection,"modelos\Datosproveedor");
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// Montar para SQL
	public function montaBind (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id_proveedor', $modelo->getId_proveedor ());
		$stmt->bindValue (':dp_nombre', $modelo->getDp_nombre ());
		$stmt->bindValue (':dp_direccion', $modelo->getDp_direccion ());
		$stmt->bindValue (':dp_cpostal', $modelo->getDp_cpostal ());
		$stmt->bindValue (':dp_poblacion', $modelo->getDp_poblacion ());
		$stmt->bindValue (':dp_tipoproveedor', $modelo->getDp_tipoproveedor ());
		$stmt->bindValue (':dp_correoelectronico', $modelo->getDp_correoelectronico ());
		$stmt->bindValue (':dp_idfiscal', $modelo->getDp_idfiscal ());
		
		return $stmt;
	}
	
	// Montar para DELETE SQL
	public function montaBindDel (string $orden, $modelo): PDOStatement {
		$stmt = $this->pdo->prepare ($orden);
		$stmt->bindValue (':id', $modelo->getId_proveedor ());
		
		return $stmt;
	}
	
	// Montar para SQL
	public function montaDebug (string $orden, $modelo): string {
		$stmt = $orden;
		$stmt = str_replace (':id_proveedor', $modelo->getId_proveedor (),$stmt);
		$stmt = str_replace (':dp_nombre', $modelo->getDp_nombre (),$stmt);
		$stmt = str_replace (':dp_direccion', $modelo->getDp_direccion (),$stmt);
		$stmt = str_replace (':dp_cpostal', $modelo->getDp_cpostal (),$stmt);
		$stmt = str_replace (':dp_poblacion', $modelo->getDp_poblacion (),$stmt);
		$stmt = str_replace (':dp_tipoproveedor', $modelo->getDp_tipoproveedor (),$stmt);
		$stmt = str_replace (':dp_correoelectronico', $modelo->getDp_correoelectronico (),$stmt);
		$stmt = str_replace (':dp_idfiscal', $modelo->getDp_idfiscal (),$stmt);
		$stmt = str_replace (':id', $modelo->getId_proveedor (),$stmt);
		
		return $stmt;
	}

}
// End Class "DaoDatosproveedor"
?>
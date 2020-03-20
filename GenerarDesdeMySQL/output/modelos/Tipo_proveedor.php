<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Tipo_proveedor
* File Name:        Tipo_proveedor.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_proveedor
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Tipo_proveedor"
class Tipo_proveedor extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_tipoproveedor;
	private $tp_nombre_tipo;
	private $tp_descripcion_tipo;
	
	const NOMBRE_TABLA_TIPO_PROVEEDOR = "tipo_proveedor";
	const NOMBRE_PK_TIPO_PROVEEDOR = "id_tipoproveedor";
	
	
	// Class Constructor
	public function __construct (int $id_tipoproveedor = null,string $tp_nombre_tipo = null,string $tp_descripcion_tipo = null) {
		parent::__construct ("Tipo_proveedor");
		if (func_num_args () > 0) {
			$this->setId_tipoproveedor ($id_tipoproveedor);
			$this->setTp_nombre_tipo ($tp_nombre_tipo);
			$this->setTp_descripcion_tipo ($tp_descripcion_tipo);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_tipoproveedor;
	}
	
	public function getId_tipoproveedor ():int {
		return (int) $this->id_tipoproveedor;
	}
	
	public function getTp_nombre_tipo ():string {
		return (string) $this->tp_nombre_tipo;
	}
	
	public function getTp_descripcion_tipo ():string {
		return (string) $this->tp_descripcion_tipo;
	}
	
	// SET Functions
	public function setid (int $id_tipoproveedor):void {
		$this->id_tipoproveedor =$id_tipoproveedor;
	}
	
	public function setId_tipoproveedor (int $id_tipoproveedor):void {
		$this->id_tipoproveedor = $id_tipoproveedor;
	}
	
	public function setTp_nombre_tipo (string $tp_nombre_tipo):void {
		$this->tp_nombre_tipo = $tp_nombre_tipo;
	}
	
	public function setTp_descripcion_tipo (string $tp_descripcion_tipo):void {
		$this->tp_descripcion_tipo = $tp_descripcion_tipo;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_tipoproveedor"=> $this->id_tipoproveedor,
		"tp_nombre_tipo"=> $this->tp_nombre_tipo,
		"tp_descripcion_tipo"=> $this->tp_descripcion_tipo
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Tipo_proveedor {
		$resp = new self ();
		$resp->setId_tipoproveedor ( (int) $datos['id_tipoproveedor']);
		$resp->setTp_nombre_tipo ( (string) $datos['tp_nombre_tipo']);
		$resp->setTp_descripcion_tipo ( (string) $datos['tp_descripcion_tipo']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_TIPO_PROVEEDOR;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_TIPO_PROVEEDOR;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_tipoproveedor",
				1 => "tp_nombre_tipo"
				);
	}
}
// End Class "Tipo_proveedor"
?>
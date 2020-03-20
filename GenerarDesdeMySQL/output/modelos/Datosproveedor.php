<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Datosproveedor
* File Name:        Datosproveedor.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     datosproveedor
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Datosproveedor"
class Datosproveedor extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_proveedor;
	private $dp_nombre;
	private $dp_direccion;
	private $dp_cpostal;
	private $dp_poblacion;
	private $dp_tipoproveedor;
	private $dp_correoelectronico;
	private $dp_idfiscal;
	
	const NOMBRE_TABLA_DATOSPROVEEDOR = "datosproveedor";
	const NOMBRE_PK_DATOSPROVEEDOR = "id_proveedor";
	
	
	// Class Constructor
	public function __construct (int $id_proveedor = null,string $dp_nombre = null,string $dp_direccion = null,string $dp_cpostal = null,int $dp_poblacion = null,int $dp_tipoproveedor = null,string $dp_correoelectronico = null,string $dp_idfiscal = null) {
		parent::__construct ("Datosproveedor");
		if (func_num_args () > 0) {
			$this->setId_proveedor ($id_proveedor);
			$this->setDp_nombre ($dp_nombre);
			$this->setDp_direccion ($dp_direccion);
			$this->setDp_cpostal ($dp_cpostal);
			$this->setDp_poblacion ($dp_poblacion);
			$this->setDp_tipoproveedor ($dp_tipoproveedor);
			$this->setDp_correoelectronico ($dp_correoelectronico);
			$this->setDp_idfiscal ($dp_idfiscal);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_proveedor;
	}
	
	public function getId_proveedor ():int {
		return (int) $this->id_proveedor;
	}
	
	public function getDp_nombre ():string {
		return (string) $this->dp_nombre;
	}
	
	public function getDp_direccion ():string {
		return (string) $this->dp_direccion;
	}
	
	public function getDp_cpostal ():string {
		return (string) $this->dp_cpostal;
	}
	
	public function getDp_poblacion ():int {
		return (int) $this->dp_poblacion;
	}
	
	public function getDp_tipoproveedor ():int {
		return (int) $this->dp_tipoproveedor;
	}
	
	public function getDp_correoelectronico ():string {
		return (string) $this->dp_correoelectronico;
	}
	
	public function getDp_idfiscal ():string {
		return (string) $this->dp_idfiscal;
	}
	
	// SET Functions
	public function setid (int $id_proveedor):void {
		$this->id_proveedor =$id_proveedor;
	}
	
	public function setId_proveedor (int $id_proveedor):void {
		$this->id_proveedor = $id_proveedor;
	}
	
	public function setDp_nombre (string $dp_nombre):void {
		$this->dp_nombre = $dp_nombre;
	}
	
	public function setDp_direccion (string $dp_direccion):void {
		$this->dp_direccion = $dp_direccion;
	}
	
	public function setDp_cpostal (string $dp_cpostal):void {
		$this->dp_cpostal = $dp_cpostal;
	}
	
	public function setDp_poblacion (int $dp_poblacion):void {
		$this->dp_poblacion = $dp_poblacion;
	}
	
	public function setDp_tipoproveedor (int $dp_tipoproveedor):void {
		$this->dp_tipoproveedor = $dp_tipoproveedor;
	}
	
	public function setDp_correoelectronico (string $dp_correoelectronico):void {
		$this->dp_correoelectronico = $dp_correoelectronico;
	}
	
	public function setDp_idfiscal (string $dp_idfiscal):void {
		$this->dp_idfiscal = $dp_idfiscal;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_proveedor"=> $this->id_proveedor,
		"dp_nombre"=> $this->dp_nombre,
		"dp_direccion"=> $this->dp_direccion,
		"dp_cpostal"=> $this->dp_cpostal,
		"dp_poblacion"=> $this->dp_poblacion,
		"dp_tipoproveedor"=> $this->dp_tipoproveedor,
		"dp_correoelectronico"=> $this->dp_correoelectronico,
		"dp_idfiscal"=> $this->dp_idfiscal
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Datosproveedor {
		$resp = new self ();
		$resp->setId_proveedor ( (int) $datos['id_proveedor']);
		$resp->setDp_nombre ( (string) $datos['dp_nombre']);
		$resp->setDp_direccion ( (string) $datos['dp_direccion']);
		$resp->setDp_cpostal ( (string) $datos['dp_cpostal']);
		$resp->setDp_poblacion ( (int) $datos['dp_poblacion']);
		$resp->setDp_tipoproveedor ( (int) $datos['dp_tipoproveedor']);
		$resp->setDp_correoelectronico ( (string) $datos['dp_correoelectronico']);
		$resp->setDp_idfiscal ( (string) $datos['dp_idfiscal']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_DATOSPROVEEDOR;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_DATOSPROVEEDOR;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_proveedor",
				1 => "dp_nombre"
				);
	}
}
// End Class "Datosproveedor"
?>
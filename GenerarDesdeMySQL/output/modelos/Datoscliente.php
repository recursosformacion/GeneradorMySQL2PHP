<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Datoscliente
* File Name:        Datoscliente.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     datoscliente
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Datoscliente"
class Datoscliente extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_cliente;
	private $dc_nombre;
	private $dc_direccion;
	private $dc_cpostal;
	private $dc_poblacion;
	private $dc_tipocliente;
	private $dc_correoelectronico;
	private $dc_idfiscal;
	
	const NOMBRE_TABLA_DATOSCLIENTE = "datoscliente";
	const NOMBRE_PK_DATOSCLIENTE = "id_cliente";
	
	
	// Class Constructor
	public function __construct (int $id_cliente = null,string $dc_nombre = null,string $dc_direccion = null,string $dc_cpostal = null,int $dc_poblacion = null,int $dc_tipocliente = null,string $dc_correoelectronico = null,string $dc_idfiscal = null) {
		parent::__construct ("Datoscliente");
		if (func_num_args () > 0) {
			$this->setId_cliente ($id_cliente);
			$this->setDc_nombre ($dc_nombre);
			$this->setDc_direccion ($dc_direccion);
			$this->setDc_cpostal ($dc_cpostal);
			$this->setDc_poblacion ($dc_poblacion);
			$this->setDc_tipocliente ($dc_tipocliente);
			$this->setDc_correoelectronico ($dc_correoelectronico);
			$this->setDc_idfiscal ($dc_idfiscal);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_cliente;
	}
	
	public function getId_cliente ():int {
		return (int) $this->id_cliente;
	}
	
	public function getDc_nombre ():string {
		return (string) $this->dc_nombre;
	}
	
	public function getDc_direccion ():string {
		return (string) $this->dc_direccion;
	}
	
	public function getDc_cpostal ():string {
		return (string) $this->dc_cpostal;
	}
	
	public function getDc_poblacion ():int {
		return (int) $this->dc_poblacion;
	}
	
	public function getDc_tipocliente ():int {
		return (int) $this->dc_tipocliente;
	}
	
	public function getDc_correoelectronico ():string {
		return (string) $this->dc_correoelectronico;
	}
	
	public function getDc_idfiscal ():string {
		return (string) $this->dc_idfiscal;
	}
	
	// SET Functions
	public function setid (int $id_cliente):void {
		$this->id_cliente =$id_cliente;
	}
	
	public function setId_cliente (int $id_cliente):void {
		$this->id_cliente = $id_cliente;
	}
	
	public function setDc_nombre (string $dc_nombre):void {
		$this->dc_nombre = $dc_nombre;
	}
	
	public function setDc_direccion (string $dc_direccion):void {
		$this->dc_direccion = $dc_direccion;
	}
	
	public function setDc_cpostal (string $dc_cpostal):void {
		$this->dc_cpostal = $dc_cpostal;
	}
	
	public function setDc_poblacion (int $dc_poblacion):void {
		$this->dc_poblacion = $dc_poblacion;
	}
	
	public function setDc_tipocliente (int $dc_tipocliente):void {
		$this->dc_tipocliente = $dc_tipocliente;
	}
	
	public function setDc_correoelectronico (string $dc_correoelectronico):void {
		$this->dc_correoelectronico = $dc_correoelectronico;
	}
	
	public function setDc_idfiscal (string $dc_idfiscal):void {
		$this->dc_idfiscal = $dc_idfiscal;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_cliente"=> $this->id_cliente,
		"dc_nombre"=> $this->dc_nombre,
		"dc_direccion"=> $this->dc_direccion,
		"dc_cpostal"=> $this->dc_cpostal,
		"dc_poblacion"=> $this->dc_poblacion,
		"dc_tipocliente"=> $this->dc_tipocliente,
		"dc_correoelectronico"=> $this->dc_correoelectronico,
		"dc_idfiscal"=> $this->dc_idfiscal
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Datoscliente {
		$resp = new self ();
		$resp->setId_cliente ( (int) $datos['id_cliente']);
		$resp->setDc_nombre ( (string) $datos['dc_nombre']);
		$resp->setDc_direccion ( (string) $datos['dc_direccion']);
		$resp->setDc_cpostal ( (string) $datos['dc_cpostal']);
		$resp->setDc_poblacion ( (int) $datos['dc_poblacion']);
		$resp->setDc_tipocliente ( (int) $datos['dc_tipocliente']);
		$resp->setDc_correoelectronico ( (string) $datos['dc_correoelectronico']);
		$resp->setDc_idfiscal ( (string) $datos['dc_idfiscal']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_DATOSCLIENTE;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_DATOSCLIENTE;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_cliente",
				1 => "dc_nombre"
				);
	}
}
// End Class "Datoscliente"
?>
<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Tipo_cliente
* File Name:        Tipo_cliente.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_cliente
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Tipo_cliente"
class Tipo_cliente extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_tipocliente;
	private $tc_nombre_tipo;
	private $tc_nombre_descripcion;
	
	const NOMBRE_TABLA_TIPO_CLIENTE = "tipo_cliente";
	const NOMBRE_PK_TIPO_CLIENTE = "id_tipocliente";
	
	
	// Class Constructor
	public function __construct (int $id_tipocliente = null,string $tc_nombre_tipo = null,string $tc_nombre_descripcion = null) {
		parent::__construct ("Tipo_cliente");
		if (func_num_args () > 0) {
			$this->setId_tipocliente ($id_tipocliente);
			$this->setTc_nombre_tipo ($tc_nombre_tipo);
			$this->setTc_nombre_descripcion ($tc_nombre_descripcion);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_tipocliente;
	}
	
	public function getId_tipocliente ():int {
		return (int) $this->id_tipocliente;
	}
	
	public function getTc_nombre_tipo ():string {
		return (string) $this->tc_nombre_tipo;
	}
	
	public function getTc_nombre_descripcion ():string {
		return (string) $this->tc_nombre_descripcion;
	}
	
	// SET Functions
	public function setid (int $id_tipocliente):void {
		$this->id_tipocliente =$id_tipocliente;
	}
	
	public function setId_tipocliente (int $id_tipocliente):void {
		$this->id_tipocliente = $id_tipocliente;
	}
	
	public function setTc_nombre_tipo (string $tc_nombre_tipo):void {
		$this->tc_nombre_tipo = $tc_nombre_tipo;
	}
	
	public function setTc_nombre_descripcion (string $tc_nombre_descripcion):void {
		$this->tc_nombre_descripcion = $tc_nombre_descripcion;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_tipocliente"=> $this->id_tipocliente,
		"tc_nombre_tipo"=> $this->tc_nombre_tipo,
		"tc_nombre_descripcion"=> $this->tc_nombre_descripcion
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Tipo_cliente {
		$resp = new self ();
		$resp->setId_tipocliente ( (int) $datos['id_tipocliente']);
		$resp->setTc_nombre_tipo ( (string) $datos['tc_nombre_tipo']);
		$resp->setTc_nombre_descripcion ( (string) $datos['tc_nombre_descripcion']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_TIPO_CLIENTE;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_TIPO_CLIENTE;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_tipocliente",
				1 => "tc_nombre_tipo"
				);
	}
}
// End Class "Tipo_cliente"
?>
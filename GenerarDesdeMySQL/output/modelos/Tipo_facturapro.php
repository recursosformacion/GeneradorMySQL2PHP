<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Tipo_facturapro
* File Name:        Tipo_facturapro.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_facturapro
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Tipo_facturapro"
class Tipo_facturapro extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_tipofacturapro;
	private $tfp_nombre;
	
	const NOMBRE_TABLA_TIPO_FACTURAPRO = "tipo_facturapro";
	const NOMBRE_PK_TIPO_FACTURAPRO = "id_tipofacturapro";
	
	
	// Class Constructor
	public function __construct (int $id_tipofacturapro = null,string $tfp_nombre = null) {
		parent::__construct ("Tipo_facturapro");
		if (func_num_args () > 0) {
			$this->setId_tipofacturapro ($id_tipofacturapro);
			$this->setTfp_nombre ($tfp_nombre);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_tipofacturapro;
	}
	
	public function getId_tipofacturapro ():int {
		return (int) $this->id_tipofacturapro;
	}
	
	public function getTfp_nombre ():string {
		return (string) $this->tfp_nombre;
	}
	
	// SET Functions
	public function setid (int $id_tipofacturapro):void {
		$this->id_tipofacturapro =$id_tipofacturapro;
	}
	
	public function setId_tipofacturapro (int $id_tipofacturapro):void {
		$this->id_tipofacturapro = $id_tipofacturapro;
	}
	
	public function setTfp_nombre (string $tfp_nombre):void {
		$this->tfp_nombre = $tfp_nombre;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_tipofacturapro"=> $this->id_tipofacturapro,
		"tfp_nombre"=> $this->tfp_nombre
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Tipo_facturapro {
		$resp = new self ();
		$resp->setId_tipofacturapro ( (int) $datos['id_tipofacturapro']);
		$resp->setTfp_nombre ( (string) $datos['tfp_nombre']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_TIPO_FACTURAPRO;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_TIPO_FACTURAPRO;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_tipofacturapro",
				1 => "tfp_nombre"
				);
	}
}
// End Class "Tipo_facturapro"
?>
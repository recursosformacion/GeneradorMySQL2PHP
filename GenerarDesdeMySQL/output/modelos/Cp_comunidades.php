<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Cp_comunidades
* File Name:        Cp_comunidades.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_comunidades
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Cp_comunidades"
class Cp_comunidades extends ModeloBase{
	
	// ************ Declaracion de variables
	private $cpcoa_id;
	private $cpcoa_nombre;
	private $cpcoa_pais;
	
	const NOMBRE_TABLA_CP_COMUNIDADES = "cp_comunidades";
	const NOMBRE_PK_CP_COMUNIDADES = "cpcoa_id";
	
	
	// Class Constructor
	public function __construct (int $cpcoa_id = null,string $cpcoa_nombre = null,int $cpcoa_pais = null) {
		parent::__construct ("Cp_comunidades");
		if (func_num_args () > 0) {
			$this->setCpcoa_id ($cpcoa_id);
			$this->setCpcoa_nombre ($cpcoa_nombre);
			$this->setCpcoa_pais ($cpcoa_pais);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->cpcoa_id;
	}
	
	public function getCpcoa_id ():int {
		return (int) $this->cpcoa_id;
	}
	
	public function getCpcoa_nombre ():string {
		return (string) $this->cpcoa_nombre;
	}
	
	public function getCpcoa_pais ():int {
		return (int) $this->cpcoa_pais;
	}
	
	// SET Functions
	public function setid (int $cpcoa_id):void {
		$this->cpcoa_id =$cpcoa_id;
	}
	
	public function setCpcoa_id (int $cpcoa_id):void {
		$this->cpcoa_id = $cpcoa_id;
	}
	
	public function setCpcoa_nombre (string $cpcoa_nombre):void {
		$this->cpcoa_nombre = $cpcoa_nombre;
	}
	
	public function setCpcoa_pais (int $cpcoa_pais):void {
		$this->cpcoa_pais = $cpcoa_pais;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"cpcoa_id"=> $this->cpcoa_id,
		"cpcoa_nombre"=> $this->cpcoa_nombre,
		"cpcoa_pais"=> $this->cpcoa_pais
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Cp_comunidades {
		$resp = new self ();
		$resp->setCpcoa_id ( (int) $datos['cpcoa_id']);
		$resp->setCpcoa_nombre ( (string) $datos['cpcoa_nombre']);
		$resp->setCpcoa_pais ( (int) $datos['cpcoa_pais']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CP_COMUNIDADES;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CP_COMUNIDADES;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "cpcoa_id",
				1 => "cpcoa_nombre"
				);
	}
}
// End Class "Cp_comunidades"
?>
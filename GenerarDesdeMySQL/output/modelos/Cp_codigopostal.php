<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Cp_codigopostal
* File Name:        Cp_codigopostal.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_codigopostal
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Cp_codigopostal"
class Cp_codigopostal extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id;
	private $cpcod_cpostal;
	private $cppob_id;
	private $cppro_id;
	
	const NOMBRE_TABLA_CP_CODIGOPOSTAL = "cp_codigopostal";
	const NOMBRE_PK_CP_CODIGOPOSTAL = "id";
	
	
	// Class Constructor
	public function __construct (int $id = null,int $cpcod_cpostal = null,int $cppob_id = null,int $cppro_id = null) {
		parent::__construct ("Cp_codigopostal");
		if (func_num_args () > 0) {
			$this->setId ($id);
			$this->setCpcod_cpostal ($cpcod_cpostal);
			$this->setCppob_id ($cppob_id);
			$this->setCppro_id ($cppro_id);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getId ():int {
		return (int) $this->id;
	}
	
	public function getCpcod_cpostal ():int {
		return (int) $this->cpcod_cpostal;
	}
	
	public function getCppob_id ():int {
		return (int) $this->cppob_id;
	}
	
	public function getCppro_id ():int {
		return (int) $this->cppro_id;
	}
	
	// SET Functions
	public function setId (int $id):void {
		$this->id = $id;
	}
	
	public function setCpcod_cpostal (int $cpcod_cpostal):void {
		$this->cpcod_cpostal = $cpcod_cpostal;
	}
	
	public function setCppob_id (int $cppob_id):void {
		$this->cppob_id = $cppob_id;
	}
	
	public function setCppro_id (int $cppro_id):void {
		$this->cppro_id = $cppro_id;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id"=> $this->id,
		"cpcod_cpostal"=> $this->cpcod_cpostal,
		"cppob_id"=> $this->cppob_id,
		"cppro_id"=> $this->cppro_id
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Cp_codigopostal {
		$resp = new self ();
		$resp->setId ( (int) $datos['id']);
		$resp->setCpcod_cpostal ( (int) $datos['cpcod_cpostal']);
		$resp->setCppob_id ( (int) $datos['cppob_id']);
		$resp->setCppro_id ( (int) $datos['cppro_id']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CP_CODIGOPOSTAL;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CP_CODIGOPOSTAL;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id",
				1 => "cpcod_cpostal"
				);
	}
}
// End Class "Cp_codigopostal"
?>
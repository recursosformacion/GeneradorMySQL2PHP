<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Cp_provincias
* File Name:        Cp_provincias.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_provincias
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Cp_provincias"
class Cp_provincias extends ModeloBase{
	
	// ************ Declaracion de variables
	private $cppro_id;
	private $cppro_nombre;
	private $cppro_codca;
	private $cppro_capital;
	
	const NOMBRE_TABLA_CP_PROVINCIAS = "cp_provincias";
	const NOMBRE_PK_CP_PROVINCIAS = "cppro_id";
	
	
	// Class Constructor
	public function __construct (int $cppro_id = null,string $cppro_nombre = null,int $cppro_codca = null,string $cppro_capital = null) {
		parent::__construct ("Cp_provincias");
		if (func_num_args () > 0) {
			$this->setCppro_id ($cppro_id);
			$this->setCppro_nombre ($cppro_nombre);
			$this->setCppro_codca ($cppro_codca);
			$this->setCppro_capital ($cppro_capital);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->cppro_id;
	}
	
	public function getCppro_id ():int {
		return (int) $this->cppro_id;
	}
	
	public function getCppro_nombre ():string {
		return (string) $this->cppro_nombre;
	}
	
	public function getCppro_codca ():int {
		return (int) $this->cppro_codca;
	}
	
	public function getCppro_capital ():string {
		return (string) $this->cppro_capital;
	}
	
	// SET Functions
	public function setid (int $cppro_id):void {
		$this->cppro_id =$cppro_id;
	}
	
	public function setCppro_id (int $cppro_id):void {
		$this->cppro_id = $cppro_id;
	}
	
	public function setCppro_nombre (string $cppro_nombre):void {
		$this->cppro_nombre = $cppro_nombre;
	}
	
	public function setCppro_codca (int $cppro_codca):void {
		$this->cppro_codca = $cppro_codca;
	}
	
	public function setCppro_capital (string $cppro_capital):void {
		$this->cppro_capital = $cppro_capital;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"cppro_id"=> $this->cppro_id,
		"cppro_nombre"=> $this->cppro_nombre,
		"cppro_codca"=> $this->cppro_codca,
		"cppro_capital"=> $this->cppro_capital
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Cp_provincias {
		$resp = new self ();
		$resp->setCppro_id ( (int) $datos['cppro_id']);
		$resp->setCppro_nombre ( (string) $datos['cppro_nombre']);
		$resp->setCppro_codca ( (int) $datos['cppro_codca']);
		$resp->setCppro_capital ( (string) $datos['cppro_capital']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CP_PROVINCIAS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CP_PROVINCIAS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "cppro_id",
				1 => "cppro_nombre"
				);
	}
}
// End Class "Cp_provincias"
?>
<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Cp_poblacion
* File Name:        Cp_poblacion.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_poblacion
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Cp_poblacion"
class Cp_poblacion extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id;
	private $cppob_id;
	private $cppro_id;
	private $cppob_nombre;
	private $cppob_ineid;
	private $cppob_lat;
	private $cppob_lon;
	
	const NOMBRE_TABLA_CP_POBLACION = "cp_poblacion";
	const NOMBRE_PK_CP_POBLACION = "id";
	
	
	// Class Constructor
	public function __construct (int $id = null,int $cppob_id = null,int $cppro_id = null,string $cppob_nombre = null,int $cppob_ineid = null,float $cppob_lat = null,float $cppob_lon = null) {
		parent::__construct ("Cp_poblacion");
		if (func_num_args () > 0) {
			$this->setId ($id);
			$this->setCppob_id ($cppob_id);
			$this->setCppro_id ($cppro_id);
			$this->setCppob_nombre ($cppob_nombre);
			$this->setCppob_ineid ($cppob_ineid);
			$this->setCppob_lat ($cppob_lat);
			$this->setCppob_lon ($cppob_lon);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getId ():int {
		return (int) $this->id;
	}
	
	public function getCppob_id ():int {
		return (int) $this->cppob_id;
	}
	
	public function getCppro_id ():int {
		return (int) $this->cppro_id;
	}
	
	public function getCppob_nombre ():string {
		return (string) $this->cppob_nombre;
	}
	
	public function getCppob_ineid ():int {
		return (int) $this->cppob_ineid;
	}
	
	public function getCppob_lat ():float {
		return (float) $this->cppob_lat;
	}
	
	public function getCppob_lon ():float {
		return (float) $this->cppob_lon;
	}
	
	// SET Functions
	public function setId (int $id):void {
		$this->id = $id;
	}
	
	public function setCppob_id (int $cppob_id):void {
		$this->cppob_id = $cppob_id;
	}
	
	public function setCppro_id (int $cppro_id):void {
		$this->cppro_id = $cppro_id;
	}
	
	public function setCppob_nombre (string $cppob_nombre):void {
		$this->cppob_nombre = $cppob_nombre;
	}
	
	public function setCppob_ineid (int $cppob_ineid):void {
		$this->cppob_ineid = $cppob_ineid;
	}
	
	public function setCppob_lat (float $cppob_lat):void {
		$this->cppob_lat = $cppob_lat;
	}
	
	public function setCppob_lon (float $cppob_lon):void {
		$this->cppob_lon = $cppob_lon;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id"=> $this->id,
		"cppob_id"=> $this->cppob_id,
		"cppro_id"=> $this->cppro_id,
		"cppob_nombre"=> $this->cppob_nombre,
		"cppob_ineid"=> $this->cppob_ineid,
		"cppob_lat"=> $this->cppob_lat,
		"cppob_lon"=> $this->cppob_lon
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Cp_poblacion {
		$resp = new self ();
		$resp->setId ( (int) $datos['id']);
		$resp->setCppob_id ( (int) $datos['cppob_id']);
		$resp->setCppro_id ( (int) $datos['cppro_id']);
		$resp->setCppob_nombre ( (string) $datos['cppob_nombre']);
		$resp->setCppob_ineid ( (int) $datos['cppob_ineid']);
		$resp->setCppob_lat ( (float) $datos['cppob_lat']);
		$resp->setCppob_lon ( (float) $datos['cppob_lon']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CP_POBLACION;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CP_POBLACION;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id",
				1 => "cppob_id"
				);
	}
}
// End Class "Cp_poblacion"
?>
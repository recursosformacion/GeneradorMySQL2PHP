<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Tipo_facturacli
* File Name:        Tipo_facturacli.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     tipo_facturacli
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Tipo_facturacli"
class Tipo_facturacli extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_tipofacturacli;
	private $tfc_nombre;
	private $tfc_poriva;
	private $tfc_porretencion;
	
	const NOMBRE_TABLA_TIPO_FACTURACLI = "tipo_facturacli";
	const NOMBRE_PK_TIPO_FACTURACLI = "id_tipofacturacli";
	
	
	// Class Constructor
	public function __construct (int $id_tipofacturacli = null,string $tfc_nombre = null,float $tfc_poriva = null,float $tfc_porretencion = null) {
		parent::__construct ("Tipo_facturacli");
		if (func_num_args () > 0) {
			$this->setId_tipofacturacli ($id_tipofacturacli);
			$this->setTfc_nombre ($tfc_nombre);
			$this->setTfc_poriva ($tfc_poriva);
			$this->setTfc_porretencion ($tfc_porretencion);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_tipofacturacli;
	}
	
	public function getId_tipofacturacli ():int {
		return (int) $this->id_tipofacturacli;
	}
	
	public function getTfc_nombre ():string {
		return (string) $this->tfc_nombre;
	}
	
	public function getTfc_poriva ():float {
		return (float) $this->tfc_poriva;
	}
	
	public function getTfc_porretencion ():float {
		return (float) $this->tfc_porretencion;
	}
	
	// SET Functions
	public function setid (int $id_tipofacturacli):void {
		$this->id_tipofacturacli =$id_tipofacturacli;
	}
	
	public function setId_tipofacturacli (int $id_tipofacturacli):void {
		$this->id_tipofacturacli = $id_tipofacturacli;
	}
	
	public function setTfc_nombre (string $tfc_nombre):void {
		$this->tfc_nombre = $tfc_nombre;
	}
	
	public function setTfc_poriva (float $tfc_poriva):void {
		$this->tfc_poriva = $tfc_poriva;
	}
	
	public function setTfc_porretencion (float $tfc_porretencion):void {
		$this->tfc_porretencion = $tfc_porretencion;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_tipofacturacli"=> $this->id_tipofacturacli,
		"tfc_nombre"=> $this->tfc_nombre,
		"tfc_poriva"=> $this->tfc_poriva,
		"tfc_porretencion"=> $this->tfc_porretencion
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Tipo_facturacli {
		$resp = new self ();
		$resp->setId_tipofacturacli ( (int) $datos['id_tipofacturacli']);
		$resp->setTfc_nombre ( (string) $datos['tfc_nombre']);
		$resp->setTfc_poriva ( (float) $datos['tfc_poriva']);
		$resp->setTfc_porretencion ( (float) $datos['tfc_porretencion']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_TIPO_FACTURACLI;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_TIPO_FACTURACLI;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_tipofacturacli",
				1 => "tfc_nombre"
				);
	}
}
// End Class "Tipo_facturacli"
?>
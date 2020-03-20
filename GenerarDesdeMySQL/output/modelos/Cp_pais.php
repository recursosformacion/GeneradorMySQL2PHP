<?php
declare (strict_types = 1);
namespace App\modelo;

use modelos\ModeloBase;


/*******************************************************************************
* Class Name:       Cp_pais
* File Name:        Cp_pais.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     cp_pais
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Cp_pais"
class Cp_pais extends ModeloBase{
	
	// ************ Declaracion de variables
	private $country_id;
	private $iso2;
	private $short_name;
	private $spanish_name;
	private $calling_code;
	private $cctld;
	private $iso3;
	private $long_name;
	private $numcode;
	private $un_member;
	
	const NOMBRE_TABLA_CP_PAIS = "cp_pais";
	const NOMBRE_PK_CP_PAIS = "country_id";
	
	
	// Class Constructor
	public function __construct (int $country_id = null,string $iso2 = null,string $short_name = null,string $spanish_name = null,string $calling_code = null,string $cctld = null,string $iso3 = null,string $long_name = null,int $numcode = null,string $un_member = null) {
		parent::__construct ("Cp_pais");
		if (func_num_args () > 0) {
			$this->setCountry_id ($country_id);
			$this->setIso2 ($iso2);
			$this->setShort_name ($short_name);
			$this->setSpanish_name ($spanish_name);
			$this->setCalling_code ($calling_code);
			$this->setCctld ($cctld);
			$this->setIso3 ($iso3);
			$this->setLong_name ($long_name);
			$this->setNumcode ($numcode);
			$this->setUn_member ($un_member);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->country_id;
	}
	
	public function getCountry_id ():int {
		return (int) $this->country_id;
	}
	
	public function getIso2 ():string {
		return (string) $this->iso2;
	}
	
	public function getShort_name ():string {
		return (string) $this->short_name;
	}
	
	public function getSpanish_name ():string {
		return (string) $this->spanish_name;
	}
	
	public function getCalling_code ():string {
		return (string) $this->calling_code;
	}
	
	public function getCctld ():string {
		return (string) $this->cctld;
	}
	
	public function getIso3 ():string {
		return (string) $this->iso3;
	}
	
	public function getLong_name ():string {
		return (string) $this->long_name;
	}
	
	public function getNumcode ():int {
		return (int) $this->numcode;
	}
	
	public function getUn_member ():string {
		return (string) $this->un_member;
	}
	
	// SET Functions
	public function setid (int $country_id):void {
		$this->country_id =$country_id;
	}
	
	public function setCountry_id (int $country_id):void {
		$this->country_id = $country_id;
	}
	
	public function setIso2 (string $iso2):void {
		$this->iso2 = $iso2;
	}
	
	public function setShort_name (string $short_name):void {
		$this->short_name = $short_name;
	}
	
	public function setSpanish_name (string $spanish_name):void {
		$this->spanish_name = $spanish_name;
	}
	
	public function setCalling_code (string $calling_code):void {
		$this->calling_code = $calling_code;
	}
	
	public function setCctld (string $cctld):void {
		$this->cctld = $cctld;
	}
	
	public function setIso3 (string $iso3):void {
		$this->iso3 = $iso3;
	}
	
	public function setLong_name (string $long_name):void {
		$this->long_name = $long_name;
	}
	
	public function setNumcode (int $numcode):void {
		$this->numcode = $numcode;
	}
	
	public function setUn_member (string $un_member):void {
		$this->un_member = $un_member;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"country_id"=> $this->country_id,
		"iso2"=> $this->iso2,
		"short_name"=> $this->short_name,
		"spanish_name"=> $this->spanish_name,
		"calling_code"=> $this->calling_code,
		"cctld"=> $this->cctld,
		"iso3"=> $this->iso3,
		"long_name"=> $this->long_name,
		"numcode"=> $this->numcode,
		"un_member"=> $this->un_member
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Cp_pais {
		$resp = new self ();
		$resp->setCountry_id ( (int) $datos['country_id']);
		$resp->setIso2 ( (string) $datos['iso2']);
		$resp->setShort_name ( (string) $datos['short_name']);
		$resp->setSpanish_name ( (string) $datos['spanish_name']);
		$resp->setCalling_code ( (string) $datos['calling_code']);
		$resp->setCctld ( (string) $datos['cctld']);
		$resp->setIso3 ( (string) $datos['iso3']);
		$resp->setLong_name ( (string) $datos['long_name']);
		$resp->setNumcode ( (int) $datos['numcode']);
		$resp->setUn_member ( (string) $datos['un_member']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CP_PAIS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CP_PAIS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "country_id",
				1 => "iso2"
				);
	}
}
// End Class "Cp_pais"
?>
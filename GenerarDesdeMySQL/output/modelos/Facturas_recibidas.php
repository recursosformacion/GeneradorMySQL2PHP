<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Facturas_recibidas
* File Name:        Facturas_recibidas.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     facturas_recibidas
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Facturas_recibidas"
class Facturas_recibidas extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_facturas;
	private $fr_identificador;
	private $fr_fecha;
	private $id_proveedor;
	private $fr_importebase;
	private $fr_porrecargoequiv;
	private $fr_poriva;
	private $fr_vencimiento;
	private $fr_comentarios;
	
	const NOMBRE_TABLA_FACTURAS_RECIBIDAS = "facturas_recibidas";
	const NOMBRE_PK_FACTURAS_RECIBIDAS = "id_facturas";
	
	
	// Class Constructor
	public function __construct (int $id_facturas = null,string $fr_identificador = null,string $fr_fecha = null,int $id_proveedor = null,float $fr_importebase = null,float $fr_porrecargoequiv = null,float $fr_poriva = null,string $fr_vencimiento = null,string $fr_comentarios = null) {
		parent::__construct ("Facturas_recibidas");
		if (func_num_args () > 0) {
			$this->setId_facturas ($id_facturas);
			$this->setFr_identificador ($fr_identificador);
			$this->setFr_fecha ($fr_fecha);
			$this->setId_proveedor ($id_proveedor);
			$this->setFr_importebase ($fr_importebase);
			$this->setFr_porrecargoequiv ($fr_porrecargoequiv);
			$this->setFr_poriva ($fr_poriva);
			$this->setFr_vencimiento ($fr_vencimiento);
			$this->setFr_comentarios ($fr_comentarios);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_facturas;
	}
	
	public function getId_facturas ():int {
		return (int) $this->id_facturas;
	}
	
	public function getFr_identificador ():string {
		return (string) $this->fr_identificador;
	}
	
	public function getFr_fecha ():string {
		return (string) $this->fr_fecha;
	}
	
	public function getId_proveedor ():int {
		return (int) $this->id_proveedor;
	}
	
	public function getFr_importebase ():float {
		return (float) $this->fr_importebase;
	}
	
	public function getFr_porrecargoequiv ():float {
		return (float) $this->fr_porrecargoequiv;
	}
	
	public function getFr_poriva ():float {
		return (float) $this->fr_poriva;
	}
	
	public function getFr_vencimiento ():string {
		return (string) $this->fr_vencimiento;
	}
	
	public function getFr_comentarios ():string {
		return (string) $this->fr_comentarios;
	}
	
	// SET Functions
	public function setid (int $id_facturas):void {
		$this->id_facturas =$id_facturas;
	}
	
	public function setId_facturas (int $id_facturas):void {
		$this->id_facturas = $id_facturas;
	}
	
	public function setFr_identificador (string $fr_identificador):void {
		$this->fr_identificador = $fr_identificador;
	}
	
	public function setFr_fecha (string $fr_fecha):void {
		$this->fr_fecha = $fr_fecha;
	}
	
	public function setId_proveedor (int $id_proveedor):void {
		$this->id_proveedor = $id_proveedor;
	}
	
	public function setFr_importebase (float $fr_importebase):void {
		$this->fr_importebase = $fr_importebase;
	}
	
	public function setFr_porrecargoequiv (float $fr_porrecargoequiv):void {
		$this->fr_porrecargoequiv = $fr_porrecargoequiv;
	}
	
	public function setFr_poriva (float $fr_poriva):void {
		$this->fr_poriva = $fr_poriva;
	}
	
	public function setFr_vencimiento (string $fr_vencimiento):void {
		$this->fr_vencimiento = $fr_vencimiento;
	}
	
	public function setFr_comentarios (string $fr_comentarios):void {
		$this->fr_comentarios = $fr_comentarios;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_facturas"=> $this->id_facturas,
		"fr_identificador"=> $this->fr_identificador,
		"fr_fecha"=> $this->fr_fecha,
		"id_proveedor"=> $this->id_proveedor,
		"fr_importebase"=> $this->fr_importebase,
		"fr_porrecargoequiv"=> $this->fr_porrecargoequiv,
		"fr_poriva"=> $this->fr_poriva,
		"fr_vencimiento"=> $this->fr_vencimiento,
		"fr_comentarios"=> $this->fr_comentarios
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Facturas_recibidas {
		$resp = new self ();
		$resp->setId_facturas ( (int) $datos['id_facturas']);
		$resp->setFr_identificador ( (string) $datos['fr_identificador']);
		$resp->setFr_fecha ( (string) $datos['fr_fecha']);
		$resp->setId_proveedor ( (int) $datos['id_proveedor']);
		$resp->setFr_importebase ( (float) $datos['fr_importebase']);
		$resp->setFr_porrecargoequiv ( (float) $datos['fr_porrecargoequiv']);
		$resp->setFr_poriva ( (float) $datos['fr_poriva']);
		$resp->setFr_vencimiento ( (string) $datos['fr_vencimiento']);
		$resp->setFr_comentarios ( (string) $datos['fr_comentarios']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_FACTURAS_RECIBIDAS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_FACTURAS_RECIBIDAS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_facturas",
				1 => "fr_identificador"
				);
	}
}
// End Class "Facturas_recibidas"
?>
<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Facturas_emitidas
* File Name:        Facturas_emitidas.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     facturas_emitidas
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Facturas_emitidas"
class Facturas_emitidas extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_facturas;
	private $fe_identificador;
	private $fe_fecha;
	private $id_cliente;
	private $fe_tipofactura;
	private $fe_importebase;
	private $fe_porretencion;
	private $fe_poriva;
	private $fe_vencimiento;
	private $fe_comentarios;
	
	const NOMBRE_TABLA_FACTURAS_EMITIDAS = "facturas_emitidas";
	const NOMBRE_PK_FACTURAS_EMITIDAS = "id_facturas";
	
	
	// Class Constructor
	public function __construct (int $id_facturas = null,string $fe_identificador = null,string $fe_fecha = null,int $id_cliente = null,int $fe_tipofactura = null,float $fe_importebase = null,float $fe_porretencion = null,float $fe_poriva = null,string $fe_vencimiento = null,string $fe_comentarios = null) {
		parent::__construct ("Facturas_emitidas");
		if (func_num_args () > 0) {
			$this->setId_facturas ($id_facturas);
			$this->setFe_identificador ($fe_identificador);
			$this->setFe_fecha ($fe_fecha);
			$this->setId_cliente ($id_cliente);
			$this->setFe_tipofactura ($fe_tipofactura);
			$this->setFe_importebase ($fe_importebase);
			$this->setFe_porretencion ($fe_porretencion);
			$this->setFe_poriva ($fe_poriva);
			$this->setFe_vencimiento ($fe_vencimiento);
			$this->setFe_comentarios ($fe_comentarios);
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
	
	public function getFe_identificador ():string {
		return (string) $this->fe_identificador;
	}
	
	public function getFe_fecha ():string {
		return (string) $this->fe_fecha;
	}
	
	public function getId_cliente ():int {
		return (int) $this->id_cliente;
	}
	
	public function getFe_tipofactura ():int {
		return (int) $this->fe_tipofactura;
	}
	
	public function getFe_importebase ():float {
		return (float) $this->fe_importebase;
	}
	
	public function getFe_porretencion ():float {
		return (float) $this->fe_porretencion;
	}
	
	public function getFe_poriva ():float {
		return (float) $this->fe_poriva;
	}
	
	public function getFe_vencimiento ():string {
		return (string) $this->fe_vencimiento;
	}
	
	public function getFe_comentarios ():string {
		return (string) $this->fe_comentarios;
	}
	
	// SET Functions
	public function setid (int $id_facturas):void {
		$this->id_facturas =$id_facturas;
	}
	
	public function setId_facturas (int $id_facturas):void {
		$this->id_facturas = $id_facturas;
	}
	
	public function setFe_identificador (string $fe_identificador):void {
		$this->fe_identificador = $fe_identificador;
	}
	
	public function setFe_fecha (string $fe_fecha):void {
		$this->fe_fecha = $fe_fecha;
	}
	
	public function setId_cliente (int $id_cliente):void {
		$this->id_cliente = $id_cliente;
	}
	
	public function setFe_tipofactura (int $fe_tipofactura):void {
		$this->fe_tipofactura = $fe_tipofactura;
	}
	
	public function setFe_importebase (float $fe_importebase):void {
		$this->fe_importebase = $fe_importebase;
	}
	
	public function setFe_porretencion (float $fe_porretencion):void {
		$this->fe_porretencion = $fe_porretencion;
	}
	
	public function setFe_poriva (float $fe_poriva):void {
		$this->fe_poriva = $fe_poriva;
	}
	
	public function setFe_vencimiento (string $fe_vencimiento):void {
		$this->fe_vencimiento = $fe_vencimiento;
	}
	
	public function setFe_comentarios (string $fe_comentarios):void {
		$this->fe_comentarios = $fe_comentarios;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_facturas"=> $this->id_facturas,
		"fe_identificador"=> $this->fe_identificador,
		"fe_fecha"=> $this->fe_fecha,
		"id_cliente"=> $this->id_cliente,
		"fe_tipofactura"=> $this->fe_tipofactura,
		"fe_importebase"=> $this->fe_importebase,
		"fe_porretencion"=> $this->fe_porretencion,
		"fe_poriva"=> $this->fe_poriva,
		"fe_vencimiento"=> $this->fe_vencimiento,
		"fe_comentarios"=> $this->fe_comentarios
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Facturas_emitidas {
		$resp = new self ();
		$resp->setId_facturas ( (int) $datos['id_facturas']);
		$resp->setFe_identificador ( (string) $datos['fe_identificador']);
		$resp->setFe_fecha ( (string) $datos['fe_fecha']);
		$resp->setId_cliente ( (int) $datos['id_cliente']);
		$resp->setFe_tipofactura ( (int) $datos['fe_tipofactura']);
		$resp->setFe_importebase ( (float) $datos['fe_importebase']);
		$resp->setFe_porretencion ( (float) $datos['fe_porretencion']);
		$resp->setFe_poriva ( (float) $datos['fe_poriva']);
		$resp->setFe_vencimiento ( (string) $datos['fe_vencimiento']);
		$resp->setFe_comentarios ( (string) $datos['fe_comentarios']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_FACTURAS_EMITIDAS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_FACTURAS_EMITIDAS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_facturas",
				1 => "fe_identificador"
				);
	}
}
// End Class "Facturas_emitidas"
?>
<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Img_documentos
* File Name:        Img_documentos.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     img_documentos
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Img_documentos"
class Img_documentos extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_documentos;
	private $imgd_relacion;
	private $imgd_identificador;
	private $imgd_clasificador;
	private $imgd_path;
	private $imgd_descripcion;
	private $imgd_usuario;
	private $imgd_ult_access;
	
	const NOMBRE_TABLA_IMG_DOCUMENTOS = "img_documentos";
	const NOMBRE_PK_IMG_DOCUMENTOS = "id_documentos";
	
	
	// Class Constructor
	public function __construct (int $id_documentos = null,enum ('FR','FE','CO','PE','AL','') $imgd_relacion = null,int $imgd_identificador = null,string $imgd_clasificador = null,string $imgd_path = null,string $imgd_descripcion = null,int $imgd_usuario = null,int $imgd_ult_access = null) {
		parent::__construct ("Img_documentos");
		if (func_num_args () > 0) {
			$this->setId_documentos ($id_documentos);
			$this->setImgd_relacion ($imgd_relacion);
			$this->setImgd_identificador ($imgd_identificador);
			$this->setImgd_clasificador ($imgd_clasificador);
			$this->setImgd_path ($imgd_path);
			$this->setImgd_descripcion ($imgd_descripcion);
			$this->setImgd_usuario ($imgd_usuario);
			$this->setImgd_ult_access ($imgd_ult_access);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_documentos;
	}
	
	public function getId_documentos ():int {
		return (int) $this->id_documentos;
	}
	
	public function getImgd_relacion ():enum ('FR','FE','CO','PE','AL','') {
		return (enum ('FR','FE','CO','PE','AL','')) $this->imgd_relacion;
	}
	
	public function getImgd_identificador ():int {
		return (int) $this->imgd_identificador;
	}
	
	public function getImgd_clasificador ():string {
		return (string) $this->imgd_clasificador;
	}
	
	public function getImgd_path ():string {
		return (string) $this->imgd_path;
	}
	
	public function getImgd_descripcion ():string {
		return (string) $this->imgd_descripcion;
	}
	
	public function getImgd_usuario ():int {
		return (int) $this->imgd_usuario;
	}
	
	public function getImgd_ult_access ():int {
		return (int) $this->imgd_ult_access;
	}
	
	// SET Functions
	public function setid (int $id_documentos):void {
		$this->id_documentos =$id_documentos;
	}
	
	public function setId_documentos (int $id_documentos):void {
		$this->id_documentos = $id_documentos;
	}
	
	public function setImgd_relacion (enum ('FR','FE','CO','PE','AL','') $imgd_relacion):void {
		$this->imgd_relacion = $imgd_relacion;
	}
	
	public function setImgd_identificador (int $imgd_identificador):void {
		$this->imgd_identificador = $imgd_identificador;
	}
	
	public function setImgd_clasificador (string $imgd_clasificador):void {
		$this->imgd_clasificador = $imgd_clasificador;
	}
	
	public function setImgd_path (string $imgd_path):void {
		$this->imgd_path = $imgd_path;
	}
	
	public function setImgd_descripcion (string $imgd_descripcion):void {
		$this->imgd_descripcion = $imgd_descripcion;
	}
	
	public function setImgd_usuario (int $imgd_usuario):void {
		$this->imgd_usuario = $imgd_usuario;
	}
	
	public function setImgd_ult_access (int $imgd_ult_access):void {
		$this->imgd_ult_access = $imgd_ult_access;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_documentos"=> $this->id_documentos,
		"imgd_relacion"=> $this->imgd_relacion,
		"imgd_identificador"=> $this->imgd_identificador,
		"imgd_clasificador"=> $this->imgd_clasificador,
		"imgd_path"=> $this->imgd_path,
		"imgd_descripcion"=> $this->imgd_descripcion,
		"imgd_usuario"=> $this->imgd_usuario,
		"imgd_ult_access"=> $this->imgd_ult_access
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Img_documentos {
		$resp = new self ();
		$resp->setId_documentos ( (int) $datos['id_documentos']);
		$resp->setImgd_relacion ( (enum ('FR','FE','CO','PE','AL','')) $datos['imgd_relacion']);
		$resp->setImgd_identificador ( (int) $datos['imgd_identificador']);
		$resp->setImgd_clasificador ( (string) $datos['imgd_clasificador']);
		$resp->setImgd_path ( (string) $datos['imgd_path']);
		$resp->setImgd_descripcion ( (string) $datos['imgd_descripcion']);
		$resp->setImgd_usuario ( (int) $datos['imgd_usuario']);
		$resp->setImgd_ult_access ( (int) $datos['imgd_ult_access']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_IMG_DOCUMENTOS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_IMG_DOCUMENTOS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_documentos",
				1 => "imgd_relacion"
				);
	}
}
// End Class "Img_documentos"
?>
<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Co_usuarios
* File Name:        Co_usuarios.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     co_usuarios
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Co_usuarios"
class Co_usuarios extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id_usuario;
	private $cou_nombre;
	private $cou_mnemonico;
	private $cou_mail;
	private $cou_password;
	
	const NOMBRE_TABLA_CO_USUARIOS = "co_usuarios";
	const NOMBRE_PK_CO_USUARIOS = "id_usuario";
	
	
	// Class Constructor
	public function __construct (int $id_usuario = null,string $cou_nombre = null,string $cou_mnemonico = null,string $cou_mail = null,string $cou_password = null) {
		parent::__construct ("Co_usuarios");
		if (func_num_args () > 0) {
			$this->setId_usuario ($id_usuario);
			$this->setCou_nombre ($cou_nombre);
			$this->setCou_mnemonico ($cou_mnemonico);
			$this->setCou_mail ($cou_mail);
			$this->setCou_password ($cou_password);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getid ():int {
		return (int) $this->id_usuario;
	}
	
	public function getId_usuario ():int {
		return (int) $this->id_usuario;
	}
	
	public function getCou_nombre ():string {
		return (string) $this->cou_nombre;
	}
	
	public function getCou_mnemonico ():string {
		return (string) $this->cou_mnemonico;
	}
	
	public function getCou_mail ():string {
		return (string) $this->cou_mail;
	}
	
	public function getCou_password ():string {
		return (string) $this->cou_password;
	}
	
	// SET Functions
	public function setid (int $id_usuario):void {
		$this->id_usuario =$id_usuario;
	}
	
	public function setId_usuario (int $id_usuario):void {
		$this->id_usuario = $id_usuario;
	}
	
	public function setCou_nombre (string $cou_nombre):void {
		$this->cou_nombre = $cou_nombre;
	}
	
	public function setCou_mnemonico (string $cou_mnemonico):void {
		$this->cou_mnemonico = $cou_mnemonico;
	}
	
	public function setCou_mail (string $cou_mail):void {
		$this->cou_mail = $cou_mail;
	}
	
	public function setCou_password (string $cou_password):void {
		$this->cou_password = $cou_password;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id_usuario"=> $this->id_usuario,
		"cou_nombre"=> $this->cou_nombre,
		"cou_mnemonico"=> $this->cou_mnemonico,
		"cou_mail"=> $this->cou_mail,
		"cou_password"=> $this->cou_password
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Co_usuarios {
		$resp = new self ();
		$resp->setId_usuario ( (int) $datos['id_usuario']);
		$resp->setCou_nombre ( (string) $datos['cou_nombre']);
		$resp->setCou_mnemonico ( (string) $datos['cou_mnemonico']);
		$resp->setCou_mail ( (string) $datos['cou_mail']);
		$resp->setCou_password ( (string) $datos['cou_password']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CO_USUARIOS;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CO_USUARIOS;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id_usuario",
				1 => "cou_nombre"
				);
	}
}
// End Class "Co_usuarios"
?>
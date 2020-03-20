<?php
declare (strict_types = 1);
namespace App\modelo;


/*******************************************************************************
* Class Name:       Customer
* File Name:        Customer.php
* Generated:        Friday, Mar 20, 2020 - 18:20:03 CET
*  - for Table:     customer
*   - in Database:  contabilidadautonomos
* Created by: table2class 
********************************************************************************/

// Files required by class:
require_once ("ModeloBase.php");

// Begin Class "Customer"
class Customer extends ModeloBase{
	
	// ************ Declaracion de variables
	private $id;
	private $password;
	private $token;
	private $user_name;
	
	const NOMBRE_TABLA_CUSTOMER = "customer";
	const NOMBRE_PK_CUSTOMER = "id";
	
	
	// Class Constructor
	public function __construct (int $id = null,string $password = null,string $token = null,string $user_name = null) {
		parent::__construct ("Customer");
		if (func_num_args () > 0) {
			$this->setId ($id);
			$this->setPassword ($password);
			$this->setToken ($token);
			$this->setUser_name ($user_name);
		}
	}
	
	// Class Destructor
	public function __destruct () {
	
	}
	
	// GET Functions
	public function getId ():int {
		return (int) $this->id;
	}
	
	public function getPassword ():string {
		return (string) $this->password;
	}
	
	public function getToken ():string {
		return (string) $this->token;
	}
	
	public function getUser_name ():string {
		return (string) $this->user_name;
	}
	
	// SET Functions
	public function setId (int $id):void {
		$this->id = $id;
	}
	
	public function setPassword (string $password):void {
		$this->password = $password;
	}
	
	public function setToken (string $token):void {
		$this->token = $token;
	}
	
	public function setUser_name (string $user_name):void {
		$this->user_name = $user_name;
	}
	
	// Salida en array
	public function getInArray (): Array {
		$array =[
		"id"=> $this->id,
		"password"=> $this->password,
		"token"=> $this->token,
		"user_name"=> $this->user_name
		];
		return $array;
	}
	
	// Construye desde array
	public static function setFromArray (array $datos) : Customer {
		$resp = new self ();
		$resp->setId ( (int) $datos['id']);
		$resp->setPassword ( (string) $datos['password']);
		$resp->setToken ( (string) $datos['token']);
		$resp->setUser_name ( (string) $datos['user_name']);
		return $resp;
	}
	
	public static function getNombreId ():string {
		return self::NOMBRE_PK_CUSTOMER;
	}
	
	public static function getNombreTabla ():string { 
		return self::NOMBRE_TABLA_CUSTOMER;
	}
	
	// para realizar desplegables
	
	public function getSelect (){
		return array (
				0 => "id",
				1 => "password"
				);
	}
}
// End Class "Customer"
?>
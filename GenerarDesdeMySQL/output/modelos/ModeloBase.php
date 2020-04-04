<?php
namespace App\modelos;


abstract Class  ModeloBase
{
    private string $modelo;

    public function __construct(string $modelo){
        $this->setModelo($modelo);
    }

    /**
     * @return string
     */
    public function getModelo():string
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo(string $modelo):void
    {
        $this->modelo = $modelo;
    }

    public abstract function getId():int;
    public abstract function setId(int $id_valor):void;
    public static abstract function getNombreId():string;
    public static abstract function getNombreTabla():string;

//     public function getXml(): string
//     {
//         $miXML=RutinasXml::arrayToXML($this->getArray(), $this->getModelo());
//         return $miXML;
//     }
}


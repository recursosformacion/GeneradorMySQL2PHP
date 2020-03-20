<?php
namespace modelos;
/*require_once (KIOSKO_RAIZ . 'service/RutinasXml.php');
use service\RutinasXml;
 */
abstract Class  ModeloBase
{
    private $modelo;

    public function __construct(string $modelo){
        $this->setModelo($modelo);
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public abstract function getId():int;
    public abstract function setId(int $id_valor):void;

/*     public function getXml(): string
    {
        $miXML=RutinasXml::arrayToXML($this->getArray(), $this->getModelo());
        return $miXML;
    } */
}


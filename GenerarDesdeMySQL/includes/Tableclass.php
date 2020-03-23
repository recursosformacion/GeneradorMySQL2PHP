<?php
/*
 * class.class.php
 *
 * This class provides methods to construct and write a class file.
 */
require_once (dirname(__FILE__) . '/class.code.php');

require_once (dirname(__FILE__) . '/FunctionClass.php');



class TableClass
{


    
    public $classname;

    // Name of database.
    public $databasename;

    // Name of table within database.
    public $tablename;

    // lista de columnas
    public $variables;

    // Nombre PRIMARY KEY
    public $primarykey;

    // Path to file we're going to write.
    private $filepath;

    // Fecha de generacion
    private $filedate;

    private $output;

    // Text to write to file.
    public $fModelReq;

    // Ruta completa para fichero Modelo
    public string $fileNameModelo;

    // Any files required. (default: class.database.php)
    public function __construct($sName = "newclass", $sDatabase = "", $sTable = "", $sPrimaryKey = "", $variables = [])
    {
        // Construction of class
        
        $this->classname = $sName;
        $this->filedate = date("l, M j, Y - G:i:s T");
        $this->fModelReq = array(
            EXTEND_MODEL
        ); // Add any other required files here.

        $this->filename = "$this->classname.php";

        if (RUTA_PROYECTO == ""){
            $this->filepath = dirname(dirname(__FILE__));
        } else {
            $this->filepath = RUTA_PROYECTO;
        }

        $this->fileNameModelo = $this->prepNombreModelo();
        Funciones::presenta($this->fileNameModelo);

        $this->databasename = $sDatabase;
        $this->tablename = $sTable;
        $this->primarykey = strtolower($sPrimaryKey);

        $this->variables = $variables;
    }

    public function setRequired($aFiles)
    {
        // Sets the required files to passed array.
        $this->fModelReq = $aFiles;
    }

    public function getHeader()
    {
        // Returns text for a header for our class file.
        $sRet = "<?php\n";
        $sRet .= "declare(strict_types = 1);\n";
        $sRet .= "namespace " . Funciones::getNamespace(NAMESPACE_PRAL,NAMESPACE_MODELO) . ";\n\n\n";
        $sRet .= "/*******************************************************************************
* Class Name:       $this->classname
* File Name:        $this->filename
* Generated:        $this->filedate
*  - for Table:     $this->tablename
*   - in Database:  $this->databasename
* Created by: table2class 
********************************************************************************/\n\n";
        $sRet .=  Funciones::getRequired($this->fModelReq);
        if (EXTEND_MODEL != "")
           $sRet .= "use " . Funciones::getNamespace(NAMESPACE_PRAL,NAMESPACE_MODELO) . "\\". EXTEND_MODEL . ";\n\n\n";
        
        // $extend = "";
        // if (! empty($this->fModelReq)) {
        // foreach ($this->fModelReq as $file) {
        // if ($extend == "")
        // $extend = $file;
        // }
        // }
        $sRet .= "// Begin Class \"$this->classname\"\n";
        $sRet .= "class $this->classname";
        if (EXTEND_MODEL != "")
            $sRet .= " extends " . EXTEND_MODEL;
        $sRet .= "{\n";

        return ($sRet);
    }

    public function getFooter()
    {
        // Returns text for a footer for our class file.
        $sRet = "}\n";
        $sRet .= "// End Class \"$this->classname\"\n?>";

        return ($sRet);
    }

    public function getVariables()
    {
        // public function to return text to declare all the variables in the class.
        $sRet = "\n// ************ Declaracion de variables\n";

        foreach ($this->variables as $variable) {
            // Loop through variables and declare them.
            $sRet .= "private \$" . strtolower($variable['field']) . ";\n";
        }
        // Add variable for connection to database.
        // & $sRet .= "public \$database;\n\n";
        $sRet .= "\n";

        $sRet .= "const NOMBRE_TABLA_" . strtoupper($this->tablename) . " = \"" . $this->tablename . "\";\n";
        $sRet .= "const NOMBRE_PK_" . strtoupper($this->tablename) . " = \"" . $this->primarykey . "\";\n";
        $sRet .= "\n\n";

        return ($sRet);
    }

    public function getConstructorDestructor()
    {
        $sRet = "";
        // public function to create the class constructor and destructor.

        $param = "";
        $campos = "";
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            if ($param != "")
                $param .= ",";
            $param .= $type . " \$" . $nombre . " = null";
            $campos .= "\$this->set" . ucfirst($nombre) . "(\$$nombre);\n";
        }

        $sRet = "// Class Constructor\npublic function __construct($param) {\n";
        $sRet .= " parent::__construct(\"$this->classname\");\n";

        $sRet .= " if (func_num_args() > 0) {\n";
        $sRet .= $campos;
        $sRet .= "}\n";
        $sRet .= "}\n\n";
        $sRet .= "// Class Destructor\npublic function __destruct() {\n";
        $sRet .= "\n}\n\n";

        return ($sRet);
    }

    public function getArray()
    {
        $sRet = "// Salida en array\n";
        $sRet .= "public function getInArray(): Array {\n";
        $sRet .= "\$array =[\n";
        $i = false;
        foreach ($this->variables as $variable) {
            if ($i)
                $sRet .= ",\n";
            $i = true;
            $nombre = strtolower($variable['field']);
            $sRet .= "\t\t\t\"$nombre\"=> \$this->$nombre";
        }
        $sRet .= "\n\t\t];\n";
        $sRet .= "\treturn \$array;\n";
        $sRet .= "}\n\n";
        return ($sRet);
    }

    public function setFromArray()
    {
        $sRet = "// Construye desde array\n";

        $sRet .= "public static function setFromArray(array \$datos) : $this->classname {\n";
        $sRet .= "\t\$resp = new self();\n";
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            $sRet .= "\$resp->set" . ucfirst($nombre) . "(($type) \$datos['$nombre']);\n";
        }
        $sRet .= "\treturn \$resp;\n";
        $sRet .= "}\n\n";
        return ($sRet);
    }

    public function getGetters()
    {
        // public function to create all the GET methods for the class.
        $sRet = "// GET Functions\n";

        // Create the primary key function.
        foreach ($this->variables as $variable) {

            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            if ($this->primarykey == $nombre && $nombre != "id") {
                $sRet .= "public function getid():$type {\n";
                $sRet .= "return (" . $type . ") \$this->$nombre;\n}\n\n";
            }
            // Loop through variables and declare them.
            /*
             * // Variable is not primary key, so we'll add it.
             * $sRet .= "public function get" . ucfirst($nombre) . "(" . $type . " \$" . $nombre . ") {\n";
             * $sRet .= "\$this->$nombre = \$$nombre;\n}\n\n";
             */
        }

        // Loop through variables to create the functions.
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            $sRet .= "public function get" . ucfirst($nombre) . "():" . $type . " {\n";
            $sRet .= "return (" . $type . ") \$this->$nombre;\n}\n\n";
        }

        return ($sRet);
    }

    public function getSetters()
    {
        // public function to create all the SET methods for the class.
        $sRet = "// SET Functions\n";
        // construccion getid para primaria
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            if ($this->primarykey == $nombre && $nombre != "id") {
                $sRet .= "public function setid($type \$$nombre):void {\n";
                $sRet .= "\$this->$nombre =\$$nombre;\n}\n\n";
            }
        }
        // Loop through variables to create the functions.
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $type = Funciones::convierteTipo($variable['type']);
            // Loop through variables and declare them.

            // Variable is not primary key, so we'll add it.
            $sRet .= "public function set" . ucfirst($nombre) . "(" . $type . " \$" . $nombre . "):void {\n";
            $sRet .= "\$this->$nombre = \$$nombre;\n}\n\n";
        }

        return ($sRet);
    }

    public function getVariosServicios(): string
    {
        $sRet = "";
        $sRet .= "public static function getNombreId():string {\n";
        $sRet .= "    return self::NOMBRE_PK_" . strtoupper($this->tablename) . ";\n";
        $sRet .= "}\n";
        $sRet .= "\n";
        $sRet .= "public static function getNombreTabla():string { \n";
        $sRet .= "    return self::NOMBRE_TABLA_" . strtoupper($this->tablename) . ";\n";
        $sRet .= "}\n";

        $paraDesc = Funciones::getParaOrden($this->primarykey , $this->variables); // para el campo de descripcion se selecciona el primero de string
        
        $sRet .= "\n// para realizar desplegables\n";
        $sRet .= "\n";
        $sRet .= "public function getSelect(){\n";
        $sRet .= "    return array(\n";
        $sRet .= "        0 => \"$this->primarykey\",\n";
        $sRet .= "         1 => \"$paraDesc\"\n";
        $sRet .= "    );\n";
        $sRet .= "}\n";
        return ($sRet);
    }

    public function createClass($bEcho = 0, $bWrite = 1)
    {
        // Creates class file.

        // Generate the file text.
        $sFile = $this->getHeader(); 
        $sFile .= $this->getVariables();
        $sFile .= $this->getConstructorDestructor();
        $sFile .= $this->getGetters();
        $sFile .= $this->getSetters();
        $sFile .= $this->getArray();
        $sFile .= $this->setFromArray();
        $sFile .= $this->getVariosServicios();
        $sFile .= $this->getFooter();

        
        return Funciones::grabaSalida($sFile, $this->fileNameModelo, $bEcho, $bWrite);
    }

    private function prepNombreModelo(): string
    {
        return $this->filepath . RUTA_MODELOS . $this->filename;
    }

    
}
?>

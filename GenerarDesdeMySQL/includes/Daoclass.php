<?php
/*
 * class.class.php
 *
 * This class provides methods to construct and write a class file.
 */
require_once (dirname(__FILE__) . '/class.code.php');

require_once (dirname(__FILE__) . '/FunctionClass.php');


class DaoClass
{

    
    //nombre del modelo
    public $classname;
    
    //nombre del DAO
    public $daoName;

    // Name of database.
    public $databasename;

    // Name of table within database.
    public $tablename;

   //lista de campos
    public $variables;

    public $primarykey;

    // Path to file we're going to write.
    private $filepath;

    // Fecha de generacion
    private $filedate;

    private $output;

    // Text to write to file.
    public $fDaoReq;
    
    //Primer campo String, para ordenar
    public $paraOrden;

    // Ruta completa para fichero DAO
    public string $fileNameDao;

    
    
    const SELECT_ALL = 'SELECT * FROM _tablename ';
    
    const SELECT_WHERE = 'SELECT * FROM FROM _tablename WHERE :where ';
    
    const SELECT_UNO = 'SELECT * FROM  _tablename  WHERE _primarykey = :id';
    
    const INSERTAR = 'INSERT into _tablename values (_listaCampos)';
    
    const ACTUALIZA = 'UPDATE _tablename  set _listaupdate
                                        WHERE _primarykey = :id ';
    
    const DELETE = 'DELETE FROM _tablename WHERE cpcoa_id = :id';
    
    // Any files required. (default: class.database.php)
    public function __construct($sName = "newclass", $sDatabase = "", $sTable = "", $sPrimaryKey = "", $variables = [], $sServerAddress = "localhost", $sServerUsername = "root", $sServerPassword = "")
    {
        // Construction of class
        
        $this->classname = $sName;
        $this->filedate = date("l, M j, Y - G:i:s T");
        
        $this->fDaoReq = array(
            EXTEND_DAO
        );

        $this->filename = "$this->classname.php";

        if (RUTA_PROYECTO == ""){
            $this->filepath = dirname(dirname(__FILE__));
        } else {
            $this->filepath = RUTA_PROYECTO;
        }

        $this->fileNameDao = $this->prepNombreDao();
        Funciones::presenta($this->fileNameDao);

        $this->databasename = $sDatabase;
        
        $this->tablename = $sTable;
        $this->primarykey = strtolower($sPrimaryKey);

        $this->variables = $variables;
        
        $this->paraOrden = Funciones::getParaOrden($this->primarykey, $this->variables);
        
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
        $sRet .= "namespace " . Funciones::getNamespace(NAMESPACE_PRAL,NAMESPACE_DAO) . ";\n\n\n";
        $sRet .= "/*******************************************************************************
* Class Name:       $this->daoName
* File Name:        $this->filename
* Generated:        $this->filedate
*  - for Table:     $this->tablename
*   - in Database:  $this->databasename
* Created by: Daoclass 
********************************************************************************/\n\n";
        $sRet .= Funciones::getRequired($this->fDaoReq);
        $sRet .= "use PDOStatement;\n";
        $sRet .= "// Begin Class \"$this->daoName\"\n";
        $sRet .= "class $this->daoName";
        if (EXTEND_DAO != "")
            $sRet .= " extends " . EXTEND_DAO;
        $sRet .= "{\n";

        return ($sRet);
    }

    public function getFooter()
    {
        // Returns text for a footer for our class file.
        $sRet = "}\n";
        $sRet .= "// End Class \"$this->daoName\"\n?>";

        return ($sRet);
    }

    public function getVariables()
    {
        
        // public function to return text to declare all the variables in the class.
        $sRet = "\n// ************ Declaracion de variables\n";
        $sRet .= 'const SELECT_ALL   = "' . $this->cambia(self::SELECT_ALL, $this->paraOrden )."\";\n";
        $sRet .= 'const SELECT_WHERE = "' . $this->cambia(self::SELECT_WHERE, $this->paraOrden )."\";\n";
        $sRet .= 'const SELECT_UNO   = "' . $this->cambia(self::SELECT_UNO)."\";\n";
        $sRet .= 'const INSERTAR     = "' . $this->cambia(self::INSERTAR)."\";\n";
        $sRet .= 'const ACTUALIZA    = "' . $this->cambia(self::ACTUALIZA)."\";\n";
        $sRet .= 'const DELETE       = "' . $this->cambia(self::DELETE)."\";\n";
        $sRet .= "\n\n";

        return ($sRet);
    }

    public function cambia($texto,$orden=null){
        $salida = $texto;
        $salida = str_replace('_tablename', $this->tablename, $salida);
        $salida = str_replace('_primarykey', $this->primarykey, $salida);
        $salida = str_replace('_listaCampos', $this->obtenListaCampos(), $salida);
        $salida = str_replace('_listaupdate', $this->obtenListaUpdate(), $salida);
        if ($orden !=null){
            $salida .= " ORDER BY " . $orden;
        }
        return $salida;
        
    }
    
    public function obtenListaCampos(){
        $salida="";
        foreach ($this->variables as $campo) {
            $salida .= strtolower($campo['field']) . ",";
        }
        substr($salida, 0, -1);
        return $salida;
    }
    
    public function obtenListaUpdate(){
        $salida="";
        foreach ($this->variables as $variable) {
            $campo=strtolower($variable['field']);
            if ($campo != $this->primarykey) {
                $salida .= $campo . '= :' . $campo . ",";
            }
        }
        substr($salida, 0, -1);
        return $salida;
    }
    
    public function getConstructorDestructor()
    {
        $sRet = "";
        // public function to create the class constructor and destructor.

        $param = "";
        $campos = "";
        
        $sRet = "// Class Constructor\npublic function __construct($param) {\n";
        $sRet .= " parent::__construct(\$connection,\"";
        $sRet .= Funciones::getNamespace(NAMESPACE_PRAL, NAMESPACE_MODELO);
        $sRet .= "\\$this->classname\");\n";
        
        $sRet .= "}\n\n";
        $sRet .= "// Class Destructor\npublic function __destruct() {\n";
        $sRet .= "\n}\n\n";

        return ($sRet);
    }

    public function getMontaBind()
    {
        $sRet = "// Montar para SQL\n";
        $sRet .= "public function montaBind(string \$orden,  \$modelo): PDOStatement {\n";
        $sRet .= "\$stmt = \$this->pdo->prepare(\$orden);\n";
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $sRet .= "\$stmt->bindValue(':$nombre', \$modelo->get". ucfirst($nombre) . "());\n";
        }
        $sRet .= "\n";
        $sRet .= "\treturn \$stmt;\n";
        $sRet .= "}\n\n";
        return ($sRet);
    }

    public function getMontaBindDel()
    {
        $sRet = "// Montar para DELETE SQL\n";
        $sRet .= "public function montaBindDel(string \$orden,  \$modelo): PDOStatement {\n";
        $sRet .= "\$stmt = \$this->pdo->prepare(\$orden);\n";
        
        $sRet .= "\$stmt->bindValue(':id', \$modelo->get". ucfirst($this->primarykey) . "());\n";
        
        $sRet .= "\n";
        $sRet .= "\treturn \$stmt;\n";
        $sRet .= "}\n\n";
        return ($sRet);
    }

    public function getMontaDebug()
    {
        $sRet = "// Montar para SQL\n";
        $sRet .= "public function montaDebug(string \$orden,  \$modelo): string {\n";
        $sRet .= "\$stmt = \$orden;\n";
        foreach ($this->variables as $variable) {
            $nombre = strtolower($variable['field']);
            $sRet .= "\$stmt = str_replace(':$nombre', \$modelo->get". ucfirst($nombre) ."()" . ",\$stmt);\n";
        }
        $sRet .= "\$stmt = str_replace(':id', \$modelo->get". ucfirst($this->primarykey) ."()" . ",\$stmt);\n";
        $sRet .= "\n";
        $sRet .= "\treturn \$stmt;\n";
        $sRet .= "}\n\n";
        return ($sRet);
    }

    
    public function createClass($bEcho = 0, $bWrite = 1)
    {
        // Creates class file.

        // Generate the file text.
        $sFile = $this->getHeader() . 
                 $this->getVariables() . 
                 $this->getConstructorDestructor() . 
                 
                 $this->getMontaBind() . 
                 $this->getMontaBindDel().
                 $this->getMontaDebug().
                 
                 $this->getFooter();
        
        // Exit the function
        return  Funciones::grabaSalida($sFile, $this->fileNameDao, $bEcho, $bWrite);
    }

    private function prepNombreDao(): string
    {
        $nombreDao = $this->classname;
        $pos = strpos($nombreDao, '_');
        if ($pos > 0) {
            $nombreDao = substr($nombreDao, $pos + 1);
        }
        $this->daoName = "Dao" . ucfirst($nombreDao);
        $this->filename=$this->daoName . ".php" ; 
        return $this->filepath .RUTA_DAOS. $this->filename;  
    }

    
}
?>

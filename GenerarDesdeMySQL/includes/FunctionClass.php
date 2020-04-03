<?php

class Funciones
{

    public static function formatCode($sCode)
    {
        // Returns formatted code string.
        $oCode = new codeObject($sCode, false);
        $oCode->process();
        return ($oCode->code);
    }

    public static function getRequired($fModelReq)
    {
        // Returns text to require all files in fModelReq array.
        $sRet = "// Files required by class:\n";

        if (! empty($fModelReq)) {
            foreach ($fModelReq as $file) {
                $sRet .= "require_once(\"$file.php\");\n";
            }
        } else {
            $sRet .= "// No files required.\n";
        }

        $sRet .= "\n";

        return ($sRet);
    }

    public static function convierteTipo(string $tipo): string
    {
        if (substr($tipo, 0, 3) == 'int' || substr($tipo, 0, 6) == 'bigint')
            return 'int';
        if (substr($tipo, 0, 7) == 'decimal')
            return 'int';
        if (substr($tipo, 0, 7) == 'tinyint')
            return 'int';
        if (substr($tipo, 0, 9) == 'timestamp')
            return 'int';
        if (substr($tipo, 0, 6) == 'double')
            return 'float';
        if (substr($tipo, 0, 7) == 'varchar')
            return 'string';
        if (substr($tipo, 0, 4) == 'char')
            return 'string';
        if (substr($tipo, 0, 4) == 'date')
            return 'string';
        if (substr($tipo, 0, 3) == 'bit')
            return 'bool';
        if (substr($tipo, 0, 4) == 'enum')
                return 'string';

        return $tipo;
    }

    public static function getParaOrden(string $primaryKey, $variables): string
    {
        $paraDesc = ""; // para el campo de descripcion se selecciona el primero de string
        foreach ($variables as $variable) {
            $nombre = strtolower($variable['field']);
            if ($primaryKey != $nombre && $paraDesc == "" && $type = "string") {
                $paraDesc = $nombre;
            }
        }

        return ($paraDesc);
    }

    public static function grabaSalida($sFile, $fileName, $bEcho = 0, $bWrite = 1)
    {
        $sFile = Funciones::formatCode($sFile);

        // If we are to display the file contents to the browser, we do so here.
        if ($bEcho) {
            echo "";
            highlight_string($sFile);
            $this->presenta("<br><br><br>Output save path: $fileName");
        }

        // If we are to write the file (default=TRUE) then we do so here.
        if ($bWrite) {
            // Check to see if file already exists, and if so, delete it.
            if (file_exists($fileName)) {
                unlink($fileName);
            }

            // Open file (insert mode), set the file date, and write the contents.
            $oFile = fopen($fileName, "w+");
            fwrite($oFile, $sFile);
        }

        // Exit the function
        return $fileName;
    }

    public static function getNamespace(string $namespace, string $namespacePart): string
    {
        $salida = "";
        $salida = $namespace;
        if ($namespacePart != "" && $salida != "") $salida .= "\\";
        $salida .= $namespacePart;
        return $salida;
    }

    public static function presenta(string $texto)
    {
        echo "--->" . $texto . "<br>";
    }
}
?>
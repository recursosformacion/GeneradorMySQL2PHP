<?php
require_once (dirname(__FILE__) . '/Tableclass.php');
require_once (dirname(__FILE__) . '/DaoClass.php');
require_once (dirname(__FILE__) . '/Conexion.php');
require_once (dirname(__FILE__) . '/config.php');

// Attempt to list databases with supplied credentials.
$_SESSION['host'] = $_POST["serveraddress"];
$_SESSION['usuario'] = $_POST["serverusername"];
$_SESSION['pass'] = $_POST["serverpassword"];
$_SESSION['db'] = $_POST["database"];
$_SESSION['tabla'] = $_POST["table"];

$oLink = Conexion::getInstance() or die("Error: Could not connect to server.");
$oResult = $oLink->query("USE " . $_SESSION['db'] . ";");

if ($_SESSION['tabla'] == "") {
    $oResult = $oLink->query( "SHOW TABLES FROM " . $_SESSION['db'] . ";");
    while( ( $db = $oResult->fetchColumn( 0 ) ) !== false ) {
        $_SESSION['tabla']  = $db ;
        $pkSQL = "SHOW KEYS FROM " ;
        $pkSQL .=  $_SESSION['tabla'];
        $pkSQL .=   " WHERE Key_name = 'PRIMARY'";
        $pk=$oLink->query( $pkSQL)->fetchAll(PDO::FETCH_ASSOC);

        generaFicheros(ucfirst($_SESSION['tabla']),$pk[0]['column_name']);
    }
    $_SESSION['tabla']="";
} else {
    generaFicheros($_POST["classname"], $_POST["keyfield"]);
}

function generaFicheros(string $classname, string $keyField)
{
    global $oLink;
    $oResult = $oLink->query("SHOW COLUMNS FROM " . $_SESSION['tabla'] . ";");
    $variables = $oResult->fetchAll();
    // Create object for class file.
    $oClass = new TableClass($classname, $_SESSION['db'], $_SESSION['tabla'], $keyField, $variables);

    // Save the class to a file.
    $strPath = realpath($oClass->createClass());
    echo "File saved as <strong>" . $strPath . "</strong>";

    $oClass = new DaoClass($classname, $_SESSION['db'], $_SESSION['tabla'], $keyField, $variables);

    // Save the class to a file.
    $strPath = realpath($oClass->createClass());
    echo "File saved as <strong>" . $strPath . "</strong>";
}
/*
 * if(isset($_GET["displayclass"]) && $_GET["displayclass"] > 0) {
 * // Display the class, do not save.
 * $oClass->createClass(TRUE, FALSE);
 * } else {
 * // Save the class to a file.
 * $oClass->createClass();
 * echo "Class created successfully.";
 * }
 */
?>
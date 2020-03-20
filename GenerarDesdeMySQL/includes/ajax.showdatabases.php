<?php
session_start();
define ('RAIZ',realpath(dirname(dirname(__FILE__))).'/');
var_dump(RAIZ . 'includes/Conexion.php');
require_once RAIZ . 'includes/Conexion.php';

// Attempt to list databases with supplied credentials.
$_SESSION['host']= $_POST["serveraddress"];
$_SESSION['usuario']=$_POST["serverusername"];
$_SESSION['pass']=$_POST["serverpassword"];
$oLink = Conexion::getInstance() or die("Error: Could not connect to server.");
$oResult = $oLink->query( 'SHOW DATABASES' );

/* // Check for valid results
if(mysql_affected_rows($oLink) == 0) {
    echo "Error: No databases returned from server \"" . $_POST["serveraddress"] . "\" (" . $_POST["serverusername"] . "@" . $_POST["serverpassword"] . ")";
    exit;
} */

// Output first option
echo "<option value=\"\"></option>";

// Output Database Names
while( ( $db = $oResult->fetchColumn( 0 ) ) !== false ) {
    echo "<option value=\"" . $db . "\">" . $db . "</option>\n";
}
?>

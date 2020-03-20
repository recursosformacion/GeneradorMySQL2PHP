<?php
session_start();

define ('RAIZ',realpath(dirname(dirname(__FILE__))).'/');

require_once RAIZ . 'includes/Conexion.php';

// Attempt to list databases with supplied credentials.
$_SESSION['host']= $_POST["serveraddress"];
$_SESSION['usuario']=$_POST["serverusername"];
$_SESSION['pass']=$_POST["serverpassword"];
$_SESSION['db'] = $_POST["database"];

$oLink = Conexion::getInstance() or die("Error: Could not connect to server.");
$oResult = $oLink->query( "USE " . $_SESSION['db'] . ";");

$oResult = $oLink->query("SHOW COLUMNS FROM " . $_POST["table"] . ";");

/* // Check for valid results
if($oLink->rowCount() == 0) {
    echo "Error: No columns returned from table \"" . $_POST["table"] . "\" in database \"" . $_POST["database"] . "\".";
    exit;
}
 */
// Output first option
echo "<option value=\"\"></option>";

// Ouput column names
while($oRow = $oResult->fetch(PDO::FETCH_OBJ)) {

    // Attempt to detect primary key column.
    if($oRow->key == "PRI") {
        // Primary key column.
        //echo "<option value=\"" . $oRow->Field . "\" selected=\"selected\">" . $oRow->Field . "</option>\n";
        echo "<option value=\"" . $oRow->field . "\" class=\"primarykey\" SELECTED>" . strtolower($oRow->field) . "</option>\n";
    } else {
        // Non-primary key column.
        echo "<option value=\"" . $oRow->field . "\">" . strtolower($oRow->field) . "</option>\n";
    }
}
?>
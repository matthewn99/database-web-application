<?php
require_once('header.php');
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class

$database = new DatabaseHelper();
//Grab variables from POST request

$teamid=$_GET['teamid'];
$vorname=$_GET['vorname'];
$nachname=$_GET['nachname'];
$modell=$_GET['modell'];
$autoid=$_GET['autoid'];
// Delete method
$error_code = $database->deleteWagen($teamid, $vorname, $nachname, $modell, $autoid);

// Check result
if ($error_code == 1){
    echo "Wagen: '{$modell}' from '{$vorname} {$nachname}' from Team {$teamid} successfully deleted!";
}
else{
    echo "Error can't delete Wagen: '{$modell}' from '{$vorname} {$nachname}' from Team {$teamid}. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="index.php">
    go back
</a>

</html>
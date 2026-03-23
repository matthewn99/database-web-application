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
$jahr=$_GET['jahr'];
$leistung=$_GET['leistung'];
$gewicht=$_GET['gewicht'];

// Insert method
$success = $database->insertIntoWagen($teamid, $vorname, $nachname, $modell, $jahr, $leistung, $gewicht);

// Check result
if ($success){
    echo "Wagen '{$modell}' for '{$vorname} {$nachname}' from team {$teamid} successfully added!'";
}
else{
    echo "Error can't insert into Wagen '{$modell}' for '{$vorname} {$nachname}' from team {$teamid}!";
}
?>

<!-- link back to index page-->
<br>
<a href="allWagen.php">
    go back to table
</a>
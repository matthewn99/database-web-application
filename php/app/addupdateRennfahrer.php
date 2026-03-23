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
$nationalitaet=$_GET['nationalitaet'];
$gebdatum=$_GET['gebdatum'];

// Insert method
$success = $database->updateRennfahrerin($teamid, $vorname, $nachname, $nationalitaet, $gebdatum);

// Check result
if ($success){
    echo "Rennfahrer  '{$vorname} {$nachname}' from team {$teamid} successfully added!'";
}
else{
    echo "Error can't insert into rennfahrerin '{$vorname} {$nachname}' into team {$teamid}!";
}
?>

    <!-- link back to index page-->

    <br>
    <a href="allRennfahrerin.php">
        go back
    </a>
</html>
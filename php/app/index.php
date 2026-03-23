<?php
require_once('header.php');

require_once('DatabaseHelper.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Fetch data from database
$rennfahrer_array = $database->selectAllRennfahrerin();
?>
    <body>
    <br>
    <h1>Willkommen zur Rennverwaltung!</h1>

    <img src="ER.png" alt="ER-Diagramm von Rennverwaltung">


    </body>
</html>

<?php
require_once('header.php');

//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();
//Grab variables from POST request

$suchen=$database->selectAllRennver();
?>

<h2>Alle Rennveranstaltungen:</h2>
<h3>Results: <?php echo count($suchen); ?></h3>
<table style="width: 40%;">
    <tr>
        <th>RennverId</th>
        <th>Rennveranstaltung</th>
        <th>Strecke</th>
        <th>Datum</th>
    </tr>
    <?php foreach ($suchen as $rennveranstaltung) : ?>
        <tr align="center">
            <td><?php echo $rennveranstaltung['RENNVERID']; ?>  </td>
            <td><a href="allBestzeiten.php"><?php echo $rennveranstaltung['RENNVERNAME']; ?>  </a></td>
            <td><?php echo $rennveranstaltung['STRECKE']; ?>  </td>
            <td><?php echo $rennveranstaltung['DATUM']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php">
    go back
</a>

</body>
</html>
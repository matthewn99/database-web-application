
<?php
require_once('header.php');

//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();
//Grab variables from POST request

$suchen=$database->selectAllBestzeiten();
?>

<h2>Bestzeiten:</h2>
<a href="allRundenzeiten.php">View all Rundenzeiten</a><br>
<a href="allQualified.php">View Qualified</a><br>
<h3>Results: <?php echo count($suchen); ?></h3>
<table style="width: 60%;">
    <tr>
        <th>Platz</th>
        <th>Team</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Hersteller</th>
        <th>Modell</th>
        <th>Bestzeit</th>
    </tr>
    <?php foreach ($suchen as $bestzeiten) : ?>
        <tr align="center">
            <td><?php echo $bestzeiten['PLATZ']; ?>  </td>
            <td><?php echo $bestzeiten['TEAMNAME']; ?>  </td>
            <td><?php echo $bestzeiten['VORNAME']; ?>  </td>
            <td><?php echo $bestzeiten['NACHNAME']; ?>  </td>
            <td><?php echo $bestzeiten['HERSTELLER']; ?>  </td>
            <td><?php echo $bestzeiten['MODELLNAME']; ?>  </td>
            <td><?php echo $bestzeiten['ZEIT']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php">
    go back
</a>

</body>
</html>
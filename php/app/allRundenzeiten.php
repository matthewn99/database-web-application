
<?php
require_once('header.php');

//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();
//Grab variables from POST request

$suchen=$database->selectAllRundenzeiten();
?>

<h2>Rundenzeiten:</h2>
<a href="allBestzeiten.php">Back to Bestzeiten</a><br>
<h3>Results: <?php echo count($suchen); ?></h3>
<table style="width: 40%;">
    <tr>
        <th>TeamId</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>AutoId</th>
        <th>Runde</th>
        <th>Rundenzeit in ms</th>
        <th>Rundenzeit in mm:ss.fff</th>
    </tr>
    <?php foreach ($suchen as $bestzeiten) : ?>
        <tr align="center">
            <td><?php echo $bestzeiten['TEAMID']; ?>  </td>
            <td><?php echo $bestzeiten['VORNAME']; ?>  </td>
            <td><?php echo $bestzeiten['NACHNAME']; ?>  </td>
            <td><?php echo $bestzeiten['AUTOID']; ?>  </td>
            <td><?php echo $bestzeiten['RUNDE']; ?>  </td>
            <td><?php echo $bestzeiten['RUNDENZEIT']; ?>  </td>
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

<?php
require_once('header.php');

//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();
//Grab variables from POST request

$suchen=$database->selectAllRennfahrerin();
?>

<h2>Alle Rennfahrer:</h2>
<a href="crudRennfahrerin.php">Add, Delete or Search in this table</a><br>
<h3>Results: <?php echo count($suchen); ?></h3>
<table style="width: 40%;">
    <tr>
        <th>TeamId</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Nationalitaet</th>
        <th>GebDatum</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    <?php foreach ($suchen as $rennfahrerin) : ?>
        <tr align="center">
            <td><?php echo $rennfahrerin['TEAMID']; ?>  </td>
            <td><?php echo $rennfahrerin['VORNAME']; ?>  </td>
            <td><?php echo $rennfahrerin['NACHNAME']; ?>  </td>
            <td><?php echo $rennfahrerin['NATIONALITAET']; ?>  </td>
            <td><?php echo $rennfahrerin['GEBDATUM']; ?>  </td>
            <td><a href="deleteRennfahrerin.php?teamid=<?php echo $rennfahrerin['TEAMID']; ?>&vorname=<?php echo $rennfahrerin['VORNAME']; ?>&nachname=<?php echo $rennfahrerin['NACHNAME']; ?>"> DELETE</a></td>
            <td><a href="updateRennfahrerin.php?teamid=<?php echo $rennfahrerin['TEAMID']; ?>&vorname=<?php echo $rennfahrerin['VORNAME']; ?>&nachname=<?php echo $rennfahrerin['NACHNAME']; ?>"> EDIT</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="index.php">
    go back
</a>

</body>
</html>
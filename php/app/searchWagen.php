<?php
require_once('header.php');

//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();
//Grab variables from POST request
$autoid=$_GET['autoid'];

$suchen=$database->searchWagenByAutoId($autoid);

if (count($suchen) == 0 ){
    echo "Error can't find Wagen with autoId: {$autoid}.";
    die();
}
?>

<h2>Wagen Search Result:</h2>
<table>
    <tr>
    <tr>
        <th>TeamId</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>AutoId</th>
        <th>Hersteller</th>
        <th>Modell</th>
        <th>Antrieb</th>
        <th>Jahr</th>
        <th>Leistung</th>
        <th>Gewicht</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </tr>
    <?php foreach ($suchen as $wagen) : ?>
        <tr align="center">
            <td><?php echo $wagen['TEAMID']; ?>  </td>
            <td><?php echo $wagen['VORNAME']; ?>  </td>
            <td><?php echo $wagen['NACHNAME']; ?>  </td>
            <td><?php echo $wagen['AUTOID']; ?>  </td>
            <td><?php echo $wagen['HERSTELLER']; ?>  </td>
            <td><?php echo $wagen['MODELL']; ?>  </td>
            <td><?php echo $wagen['ANTRIEB']; ?>  </td>
            <td><?php echo $wagen['JAHR']; ?>  </td>
            <td><?php echo $wagen['LEISTUNG']; ?>  </td>
            <td><?php echo $wagen['GEWICHT']; ?>  </td>
            <td><a href="deleteWagen.php?teamid=<?php echo $wagen['TEAMID']; ?>&vorname=<?php echo $wagen['VORNAME']; ?>&nachname=<?php echo $wagen['NACHNAME']; ?>&modell=<?php echo $wagen['MODELL']; ?>&autoid=<?php echo $wagen['AUTOID']; ?>"> DELETE</a></td>
            <td><a href="updateRennfahrerin.php?teamid=<?php echo $wagen['TEAMID']; ?>&vorname=<?php echo $rennfahrerin['VORNAME']; ?>&nachname=<?php echo $rennfahrerin['NACHNAME']; ?>"> EDIT</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>

</html>
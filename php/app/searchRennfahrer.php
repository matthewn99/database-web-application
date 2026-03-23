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
$suchen=$database->searchRennfahrerin($teamid, $vorname, $nachname);

if (count($suchen) == 0 ){
    echo "Error can't find Rennfahrer with first name: '{$vorname}', last name: '{$nachname}' from team {$teamid}.";
    die();
}
?>

    <h2>Rennfahrer Search Result:</h2>
    <table>
        <tr>
            <th>teamid</th>
            <th>vorname</th>
            <th>nachname</th>
            <th>nationalitaet</th>
            <th>gebdatum</th>
        </tr>
        <?php foreach ($suchen as $rennfahrerin) : ?>
            <tr>
                <td><?php echo $rennfahrerin['TEAMID']; ?>  </td>
                <td><?php echo $rennfahrerin['VORNAME']; ?>  </td>
                <td><?php echo $rennfahrerin['NACHNAME']; ?>  </td>
                <td><?php echo $rennfahrerin['NATIONALITAET']; ?>  </td>
                <td><?php echo $rennfahrerin['GEBDATUM']; ?>  </td>
                <td><a href="deleteRennfahrerin.php?teamid=<?php echo $rennfahrerin['TEAMID']; ?>&vorname=<?php echo $rennfahrerin['VORNAME']; ?>&nachname=<?php echo $rennfahrerin['NACHNAME']; ?>"> DELETE</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    </body>

</html>
<?php

class DatabaseHelper {
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'a12033416'; // use a + your matriculation number
    const password = 'dbs21'; // use your oracle db password
    const con_string = '//oracle-lab.cs.univie.ac.at:1521/lab';


    protected $conn;

    // Create connection in the constructor
    public function __construct() {
        try {
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    public function __destruct() {
        // clean up
        oci_close($this->conn);
    }

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectAllRennfahrerin() {
        $sql = "select * from rennfahrerin order by teamid";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function selectAllWagen() {
        $sql = "select w.teamid, w.vorname, w.nachname, w.autoid, h.herstellername as hersteller, w.modell, a.antriebskuerzel as antrieb, w.jahr, w.leistung, w.gewicht 
                from wagen w inner join modell m on w.modell = m.modellname inner join hersteller h on h.herstellername = m.hersteller inner join antrieb a on a.antriebskuerzel = m.antrieb order by autoid";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function selectAllRennver() {
        $sql = "select * from rennveranstaltung";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function selectAllBestzeiten() {
        $sql = "select platz, teamname, vorname, nachname, hersteller, modellname, concat(concat(concat(concat(concat(concat(concat(floor(bestzeit/60000),':'), floor(mod(bestzeit,60000)/10000)),floor(mod((mod(bestzeit, 60000)/1000), 10))),'.'),
                floor(mod((mod(bestzeit, 60000)), 1000)/100)), floor(mod((mod((mod(bestzeit,60000)), 1000)/10),10))),mod((mod((mod(bestzeit,60000)), 10)),10)) as zeit from rankings";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function selectAllQualified() {
        $sql = "select * from rankings_q_time";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function selectAllRundenzeiten() {
        $sql = "select r.*, concat(concat(concat(concat(concat(concat(concat(floor(rundenzeit/60000),':'), 
                floor(mod(rundenzeit,60000)/10000)),floor(mod((mod(rundenzeit, 60000)/1000), 10))),'.'),
                floor(mod((mod(rundenzeit, 60000)), 1000)/100)), floor(mod((mod((mod(rundenzeit,60000)), 1000)/10),10))),
                mod((mod((mod(rundenzeit,60000)), 10)),10)) as zeit from rundenzeiten_all r order by rundenzeit";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }
    public function searchRennfahrerin($teamid, $vorname, $nachname) {
        $sql = "SELECT * FROM rennfahrerin 
        WHERE teamid={$teamid} and vorname='{$vorname}' and nachname='{$nachname}'";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);
        return $res;
    }
    public function searchWagenByAutoId($autoid) {
        $sql = "select w.teamid, w.vorname, w.nachname, w.autoid, h.herstellername as hersteller, w.modell, a.antriebskuerzel as antrieb, w.jahr, w.leistung, w.gewicht 
                from wagen w inner join modell m on w.modell = m.modellname inner join hersteller h on h.herstellername = m.hersteller inner join antrieb a on a.antriebskuerzel = m.antrieb where autoid={$autoid} order by autoid";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);
        return $res;
    }

    // This function creates and executes a SQL insert statement and returns true or false
    public function insertIntoRennfahrerin($teamid, $vorname, $nachname, $nationalitaet, $gebdatum) {
        $sql = "INSERT INTO rennfahrerin (teamid, vorname, nachname, nationalitaet, gebdatum) VALUES ({$teamid}, '{$vorname}', '{$nachname}', '{$nationalitaet}', TO_DATE('{$gebdatum}', 'yyyy/mm/dd'))";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
    public function insertIntoWagen($teamid, $vorname, $nachname, $modell, $jahr, $leistung, $gewicht) {
        $sql = "INSERT INTO wagen (teamid, vorname, nachname, modell, jahr, leistung, gewicht) VALUES ({$teamid}, '{$vorname}', '{$nachname}', '{$modell}', {$jahr}, {$leistung}, {$gewicht})";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    // Using a Procedure
    // This function uses a SQL procedure to delete a person and returns an errorcode (&errorcode == 1 : OK)
    public function deleteRennfahrerin($teamid, $vorname, $nachname) {
        $sql = "DELETE FROM rennfahrerin WHERE teamid={$teamid} and vorname='{$vorname}' and nachname='{$nachname}' ";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
    public function deleteWagen($teamid, $vorname, $nachname, $modell, $autoid) {
        $sql = "DELETE FROM wagen WHERE teamid={$teamid} and vorname='{$vorname}' and nachname='{$nachname}' and modell='{$modell}' and autoid={$autoid}";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function updateRennfahrerin($teamid, $vorname, $nachname, $nationalitaet, $gebdatum) {
        $sql = "UPDATE rennfahrerin SET teamid={$teamid}, vorname='{$vorname}', nachname='{$nachname}', nationalitaet='{$nationalitaet}', gebdatum=TO_DATE('{$gebdatum}', 'yyyy/mm/dd')
                WHERE teamid={$teamid} and vorname='{$vorname}' and nachname='{$nachname}'";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
    public function updateWagen($teamid, $vorname, $nachname, $autoid, $modell, $jahr, $leistung, $gewicht) {
        $sql = "UPDATE wagen SET teamid={$teamid}, vorname='{$vorname}', nachname='{$nachname}', modell='{$modell}', jahr={$jahr}, leistung={$leistung}, gewicht={$gewicht}
                WHERE autoid={$autoid}";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }
}
<?php
    require(SERVER_ROOT . 'models/database.php');
    function hat_talalatos() {
        global $db;
        $query = "
                    SELECT huzas.ev, huzas.het, nyeremeny.darab, huzott.szam
                    FROM huzas
                    INNER JOIN nyeremeny ON nyeremeny.huzasid = huzas.id
                    INNER JOIN huzott ON huzott.huzasid = huzas.id
                    WHERE nyeremeny.talalat = 6
                    ORDER BY huzas.ev DESC, huzas.het DESC 
                ";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
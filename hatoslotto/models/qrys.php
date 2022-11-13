<?php
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
        $results = $statement.fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function hatos_evente() {
        global $db;
        $query = "
                    SELECT huzas.ev, COUNT(nyeremeny.darab)
                    FROM nyeremeny
                    INNER JOIN huzas ON huzas.id = nyeremeny.huzasid
                    WHERE talalat = 6
                    GROUP BY huzas.ev
                    ORDER BY huzas.ev DESC
                ";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement.fetchAll();
        $statement->closeCursor();
        return $results;
    }

    function hat_talalatos_intervallum($ev_start, $ev_utolso) {
        global $db;
        $query = "
                    SELECT huzas.ev, huzas.het, nyeremeny.darab, huzott.szam
                    FROM huzas
                    INNER JOIN nyeremeny ON nyeremeny.huzasid = huzas.id
                    INNER JOIN huzott ON huzott.huzasid = huzas.id
                    WHERE nyeremeny.talalat = 6 AND (huzas.ev BETWEEN :ev_start AND :ev_utolso)
                    ORDER BY huzas.ev DESC, huzas.het DESC 
                ";
        $statement = $db->prepare($query);
        $statement->bindValue(':ev_start', $ev_start);
        $statement->bindValue(':ev_utolso', $ev_utolso);
        $statement->execute();
        $results = $statement.fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
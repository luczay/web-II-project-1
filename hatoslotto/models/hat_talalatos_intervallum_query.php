<?php
    require(SERVER_ROOT . 'models/database.php');
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
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
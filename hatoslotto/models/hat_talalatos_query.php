<?php
    require(SERVER_ROOT . 'models/database.php');
    function hat_talalatos($start_year, $end_year, $money) {
        global $db;
        $query = "
                    SELECT huzas.ev, huzas.het, nyeremeny.darab, huzott.szam, nyeremeny.ertek
                    FROM huzas
                    INNER JOIN nyeremeny ON nyeremeny.huzasid = huzas.id
                    INNER JOIN huzott ON huzott.huzasid = huzas.id
                    WHERE nyeremeny.talalat = 6 AND nyeremeny.ertek > :money AND huzas.ev BETWEEN :start_year AND :end_year
                    ORDER BY huzas.ev DESC
                ";
        $statement = $db->prepare($query);
        $statement->execute(array(':money'=>$money, ':start_year'=>$start_year, ':end_year'=>$end_year));
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
<?php
    require(SERVER_ROOT . 'models/database.php');
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
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
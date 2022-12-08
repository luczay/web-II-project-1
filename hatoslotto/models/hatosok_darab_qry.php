<?php
    require(SERVER_ROOT . 'models/database.php');
    function hatosok_darab() {
        global $db;
        $query = "
                    SELECT nyeremeny.darab
                    FROM huzas
                    INNER JOIN nyeremeny ON nyeremeny.huzasid = huzas.id
                    WHERE nyeremeny.talalat = 6
                    ORDER BY nyeremeny.darab DESC
                ";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
?>
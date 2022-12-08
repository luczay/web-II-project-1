<?php 
    $dsn = 'mysql:host=localhost;dbname=luczaydonyadi2u';
    $username = 'luczaydonyadi2u';
    $password = 'NeverMind99';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo($error_message);
        //include('view/error.php');
        exit();
    }
?>
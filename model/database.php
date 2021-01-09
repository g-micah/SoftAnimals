<?php
    $dsn = 'mysql:host=185.201.11.128;dbname=u836136612_ShoppingCart';
    $username = 'u836136612_ShoppingCart';
    $password = 'myPublicPass0';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "beejee";

    $mysqli = new mysqli($host,$username,$password,$db_name);

    if ($mysqli -> connect_errno) {
        echo "Ошибка соединения с MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>
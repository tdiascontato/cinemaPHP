<?php
    $db_host = "localhost";
    $db_name = "cinema";
    $user = "root" ;
    $password = "";
    $conn = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $user, $password);
    /*Configurações para debugar mais rápido*/
    $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn-> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
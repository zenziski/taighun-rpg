<?php
    require '../global.php';

    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $db = $_ENV['DB_DATABASE'];
    $host = $_ENV['DB_HOST'];

    $conn = new mysqli($host, $user, $password, $db);

    if($conn->errors){
        echo "Falhou ao conectar no banco";
        die();
    }

?>
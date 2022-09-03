<?php
    require '../global.php';

    $user = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $db = $_ENV['DB_DATABASE'];
    $host = $_ENV['DB_HOST'];

    $conn = new mysqli($host, $user, $password, $db);

    if($conn->error){
        echo "Falhou ao conectar no banco";
        die();
    }

?>
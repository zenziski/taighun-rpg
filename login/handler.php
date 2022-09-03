<?php
    require '../config/config.php';

    if(strlen($_POST['user']) == 0 || strlen($_POST['password']) == 0){
        header('Location: https://taighun.cauleinc.com?error=empty_data');
    }
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * from users WHERE username='". $user ."' and password='".$password."'";

    $result = $conn->query($query);

    echo $result;

?>
<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    ob_start();
    require '../config/config.php';
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * from users WHERE user='". $user ."' and password='".$password."'";

    $result = $conn->query($query);

    if(!mysqli_num_rows($result)){
        header('Location: '.$_ENV['URL_BASE'].'?error=incorrect_data');
    }else{
        $row = $result->fetch_assoc();

        $_SESSION['user'] = $row['user'];
        $_SESSION['user_id'] = $row['id'];
    
        header('Location: '.$_ENV['URL_BASE'].'/dashboard.php');
    }
    

?>
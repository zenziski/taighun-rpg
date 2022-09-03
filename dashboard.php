<?php
    require './global.php';
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: '.$_ENV['URL_BASE'].'');
    }



?>
<?php
  require '../global.php';
  include "../config/config.php";

  session_start();
  if(!isset($_SESSION['user'])){
      header('Location: '.$_ENV['URL_BASE'].'');
  }

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM knowledges WHERE id = $id ";

    $result = $conn->query($sql);

    if($result == TRUE) {
      echo "Conhecimento Apagado Com Sucesso!";
    } else {
      echo "Error:" . $sql . "<br>" . $conn->error;
    }
  }
?>
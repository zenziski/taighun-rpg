<?php
  require '../global.php';
  include "../config/config.php";

  session_start();
  if(!isset($_SESSION['user'])){
      header('Location: '.$_ENV['URL_BASE'].'');
  }

  $sql = "SELECT * FROM knowledges";

  $result = $conn->query($sql);
?>

<!--Listando os conhecimentos-->
<?php   
    include '../includes/header.php'; 
?>
<div class="container">
  <h3>Conhecimentos Criados:</h3>
  <table class="table">
    <head>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Volume</th>
        <th>Valor</th>
        <th>Missão</th>
        <th>Recompensa</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if($result->num_rows>0) {
          while($row = $result->fetch_assoc()) {
            echo '
              <tr>
              <td> '.$row["id"].' </td>
              <td> '.$row["name"].' </td>
              <td> '.$row["description"].' </td>
              <td> '.$row["volume"].' </td>
              <td> '.$row["value"].' </td>
              <td> '.$row["mission"].' </td>
              <td> '.$row["reward"].' </td>
              <td><a class="btn btn-info" href="update.php?id='.$row["id"].'"><i class="bi bi-pencil-square"></i></td>
              <td><a class="btn btn-danger" href="delete.php?id='.$row["id"].'"><i class="bi bi-trash"></i></td>
              </tr>
            ';
          }
        }
      ?>
    </tbody>
</div>

<?php 
    include '../includes/footer.php';
?>
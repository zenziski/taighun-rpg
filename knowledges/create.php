<?php
  require '../global.php';
  include "../config/config.php";

  session_start();
  if(!isset($_SESSION['user'])){
      header('Location: '.$_ENV['URL_BASE'].'');
  }
  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $volume = $_POST['volume'];
    $value = $_POST['value'];
    $mission = $_POST['mission'];
    $reward = $_POST['reward'];
    
    $sql = "INSERT INTO knowledges (name, description, volume, value, mission, reward) VALUES ('$name', '$description', $volume, $value, '$mission', '$reward' )";
    
    $result = $conn->query($sql);
    

    if($result == TRUE) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Novo Conhecimento Criado Com Sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button></div>";
    } else {
      echo "<div class='alert alert-success'>Erro:" . $sql . "<br>" . $conn->error. "</div>";
    }

    $conn->close();
    header('Refresh:0');
  } 
?>

<!--Forms dos conhecimentos-->
<?php   
    include '../includes/header.php'; 
?>

<form action="./create.php" method="POST">
  <div class="col-md-4 col-md-offset-4">
    <h3>Criação de Conhecimento:</h3>
    <div class="form-group">
      Nome:<input class="form-control" type="text" placeholder="Ex: Campeões de Birkaerod" name="name">
    </div>
    <div class="form-group">
      Descrição:<textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-group w-25">
      Volume:<input class="form-control form-control-sm" type="number" name="volume">
    </div>
    <div class="form-group w-25">
      Valor:<input class="form-control form-control-sm" type="number" name="value">
    </div>
    <div class="form-group">
      Missão:<textarea class="form-control" id="description" rows="3" name="mission"></textarea>
    </div>
    <div class="form-group">
      Recompensa:<textarea class="form-control" id="description" rows="3" name="reward"></textarea>
    </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Criar">
  </div>
</form>

<?php 
    include '../includes/footer.php';
?>
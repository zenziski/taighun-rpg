<?php
  require '../global.php';
  include "../config/config.php";

  session_start();
  if(!isset($_SESSION['user'])){
      header('Location: '.$_ENV['URL_BASE'].'');
  }

  if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $volume = $_POST['volume'];
    $value = $_POST['value'];
    $mission = $_POST['mission'];
    $reward = $_POST['reward'];

    $sql ="UPDATE knowledges SET name = '$name', description = '$description', volume = '$volume', value = '$value', mission = '$mission', reward = '$reward' WHERE id = ".$_GET['id']."";
    
    $result = $conn->query($sql);

    if($result == TRUE) {
      echo "Conhecimento Atualizado Com Sucesso!";
    } else {
      echo "Erro:" . $sql . "<br>" .$conn->error;
    }
  }

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM knowledges WHERE id=$id";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $description = $row['description'];
        $volume = $row['volume'];
        $value = $row['value'];
        $mission = $row['mission'];
        $reward = $row['reward'];
      }
    }
?>
<?php   
    include '../includes/header.php'; 
?>
<br>
<form action="./update.php?id=<?php echo $id?>" method="POST">
  <div class="col-md-4 col-md-offset-4">
    <h3>Atualização de Conhecimento:</h3>
    <div class="form-group">
      Nome:<input class="form-control" type="text" placeholder="Ex: Campeões de Birkaerod" name="name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      Descrição:<textarea class="form-control" id="description" rows="3" name="description"><?php echo $description ?></textarea>
    </div>
    <div class="form-group w-25">
      Volume:<input class="form-control form-control-sm" type="number" name="volume" value="<?php echo $volume ?>">
    </div>
    <div class="form-group w-25">
      Valor:<input class="form-control form-control-sm" type="number" name="value" value="<?php echo $value ?>">
    </div>
    <div class="form-group">
      Missão:<textarea class="form-control" id="description" rows="3" name="mission"><?php echo $mission ?></textarea>
    </div>
    <div class="form-group">
      Recompensa:<textarea class="form-control" id="description" rows="3" name="reward"><?php echo $reward ?></textarea>
    </div>
      <input type="submit" class="btn btn-primary" name="update" value="Atualizar">
  </div>
</form>

<?php 
    include '../includes/footer.php';
  }
?>
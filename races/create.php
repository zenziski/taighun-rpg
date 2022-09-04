<?php

require '../config/config.php';
require '../global.php';
require '../functions.php';

require '../includes/header.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ' . $_ENV['URL_BASE'] . '');
}

if (isset($_POST['submit'])) {
    $nome = $_POST['name'];
    $idade_maxima = $_POST['max_age'];
    $vida_inical = $_POST['initial_life'];
    $initial_sanity = $_POST['initial_sanity'];
    $benefit = $_POST['benefit'];
    $burden = $_POST['burden'];
    $description = $_POST['name'];
    $bonus = "";
    foreach($_POST['bonus'] as $var){
        if($bonus == "") {
            $bonus = $var;
        }else{
            $bonus .= ';' . $var;
        }
    }

    $query = "INSERT INTO 
                races
                (`name`, `description`, `initial_life`, `initial_sanity`, `benefit`, `burden`, `bonus`, `max_age`) 
                VALUES 
                ('$nome','$description','$vida_inical','$initial_sanity','$benefit','$burden','$bonus','$idade_maxima')";

    $conn->query($query);
    echo addAlert('success', 'Raça incluída com sucesso!');
}
?>

<form action="./create.php" method="POST">
    <div class="col-md-4 col-md-offset-4">
        <h3>Criação de raça:</h3>
        <div class="form-group">
            Nome:<input class="form-control" type="text" placeholder="Ex: Humano" name="name">
        </div>
        <div class="form-group">
            Descrição:<textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group w-25">
            Vida inicial:<input class="form-control form-control-sm" type="number" name="initial_life">
        </div>
        <div class="form-group w-25">
            Sanidade Inicial:<input class="form-control form-control-sm" type="number" name="initial_sanity">
        </div>
        <div class="form-group">
            Benefício:<textarea class="form-control" id="benefit" rows="3" name="benefit"></textarea>
        </div>
        <div class="form-group">
            Fardo:<textarea class="form-control" id="burden" rows="3" name="burden"></textarea>
        </div>
        <div class="form-group">
            Bônus de atributo:
            <ul>
                <li>Força: <input type="checkbox" name="bonus[]" value="Força"></li>
                <li>Percepção e mira: <input type="checkbox" name="bonus[]" value="Percepção e Mira"></li>
                <li>Destreza: <input type="checkbox" name="bonus[]" value="Destreza"></li>
                <li>Inteligência: <input type="checkbox" name="bonus[]" value="Inteligência"></li>
                <li>Constituição: <input type="checkbox" name="bonus[]" value="Constituição"></li>
                <li>Carisma: <input type="checkbox" name="bonus[]" value="Carisma"></li>
                <li>Intimidação: <input type="checkbox" name="bonus[]" value="Intimidação"></li>
                <li>Furtividade: <input type="checkbox" name="bonus[]" value="Furtividade"></li>
                <li>Consciência: <input type="checkbox" name="bonus[]" value="Consciência"></li>
            </ul>
        </div>
        <div class="form-group w-25">
            Idade máxima:<input class="form-control form-control-sm" type="number" name="max_age">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Criar">
    </div>
</form>


<?php require '../includes/footer.php' ?>
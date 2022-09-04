<?php

    require '../config/config.php';
    require '../global.php';

    require '../includes/header.php';
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: '.$_ENV['URL_BASE'].'');
    }
    $query = 'SELECT id, name, description FROM races';
    $result = $conn->query($query);

    if(!mysqli_num_rows($result)){
        echo '<h1>Não foi encontrado nenhuma raça no banco de dados.</h1>';
    }else{
        echo '<div class="table-container">';
        echo '<table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
        </thead>
            <tbody>';
        while($row = $result->fetch_assoc()){
            echo "
                <tr>
                    <td>".$row['name']."</td>
                    <td>".$row['description']."</td>
                    <td><button class='btn btn-success'><a href='".$_ENV['URL_BASE']."/races/details.php?id=".$row['id']."'>Detalhes</a></button></td>
                </tr>
            ";
        }
        echo "
                    </tbody>
                </table>
            </div>
        ";
    }

    require '../includes/footer.php';

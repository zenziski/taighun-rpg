<?php

    require '../config/config.php';
    require '../global.php';

    require '../includes/header.php';
    session_start();

    if(!isset($_SESSION['user'])){
        header('Location: '.$_ENV['URL_BASE'].'');
    }

    if(!isset($_GET['id'])){
        echo "<h1>Não encontrado nenhuma raça.</h1>";
    }else{
        $query = 'SELECT * FROM races where id = "'.$_GET['id'].'"';
        $result = $conn->query($query);
    
        if(!mysqli_num_rows($result)){
            echo '<h1>Não foi encontrado nenhuma raça no banco de dados.</h1>';
        }else{
            $row = $result->fetch_assoc();
            echo '
            <div class="detail-container">
                <div class="detail-stats">
                    <div class="aside">
                        <ul>
                            <li class="race-img">IMG PLACEHOLDER</li>
                            <li>Nome: '.$row['name'].'</li>
                            <li>Vida inicial: '.$row['initial_life'].'</li>
                            <li>Sanidade inicial: '.$row['initial_sanity'].'</li>
                            <li>Benefício: '.$row['benefit'].'</li>
                            <li>Fardo: '.$row['burden'].'</li>
                            <li>Bônus: '.$row['bonus'].'</li>
                            <li>Idade máxima: '.$row['max_age'].'</li>
                            <li> Descrição: '.$row['description'].' </li>
                        </ul>
                    </div>
                </div>
                <div class="detail-description">
                        <div class="abilities">
                            list habilities
                        </div>
                    </div>
                
            </div>
            ';

        }
    }
    require '../includes/footer.php';

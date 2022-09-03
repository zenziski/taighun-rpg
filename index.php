<!DOCTYPE html>
<html lang="en">
<?php  
    require './global.php'
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Crônicas de Taighún</title>
</head>

<body>
    <div class="self-container">
        <div class="card-container">
            <div class="card">
                <img class="card-img-top" src="./src/img/logo.png" alt="Imagem de capa do card" width="100" height="100">
                <?php
                if (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 'empty_data':
                            echo '
                            <div class="alert-container">
                                <div class="alert alert-warning self-alert" role="alert">
                                    Preencha todos os campos para fazer o login!
                                </div>
                            </div>
                                ';
                            break;

                        default:
                            break;
                    }
                }
                ?>
                
                <div class="card-body">
                    <form action="./login/handler.php" method="post" class="login-form">
                        <div class="form-group">
                            <h5 class="card-title">Login</h5>
                            <input type="text" name="user" id="user" placeholder="Nome de usuário" class="form-control">
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
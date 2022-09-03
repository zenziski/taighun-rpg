<?php   
    require './global.php';
    require './functions.php';
    include __DIR__.'/includes/header.php'; 
?>
    <div class="self-container">
        <div class="card-container">
            <div class="card">
                <img class="card-img-top" src="./src/img/logo.png" alt="Imagem de capa do card" width="100" height="100">
                <?php
                if (isset($_GET['error'])) {
                    $var = addAlert('danger', 'Usuário ou senha incorretos.');
                    echo $var;
                }
                ?>
                <div class="card-body">
                    <form action="./login/handler.php" method="post" class="login-form">
                        <div class="form-group">
                            <h5 class="card-title">Login</h5>
                            <input type="text" name="user" id="user" placeholder="Nome de usuário" class="form-control" required>
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
    include __DIR__.'/includes/footer.php';
?>
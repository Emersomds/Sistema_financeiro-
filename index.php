<?php
//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMaster</title>
    <link rel="stylesheet" href="adm/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <!-- Criado o formulário para o usuário colocar os dados de acesso.  -->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container" style="margin-top: 200px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="background-color: rgba(32, 33, 34, 0.164);">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Àrea Restrita</h3>
                                    <p class="text-danger">
                                        <?php
                                        //Recuperando o valor da variável global, os erro de login.
                                        if (isset($_SESSION['loginErro'])) {
                                            echo $_SESSION['loginErro'];
                                            unset($_SESSION['loginErro']);
                                        } ?>
                                    </p>
                                    <p class="text-success">
                                        <?php
                                        //Recuperando o valor da variável global, deslogado com sucesso.
                                        if (isset($_SESSION['logindeslogado'])) {
                                            echo $_SESSION['logindeslogado'];
                                            unset($_SESSION['logindeslogado']);
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="adm/actions/validaLogin.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required autofocus />
                                            <label for="inputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="senha" placeholder="Senha" required />
                                            <label for="inputPassword">Senha</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="recuperar_senha.php" style="text-decoration: none;">Esqueceu a senha?</a>
                                            <!-- <a class="btn btn-primary" href="index.php">Login</a> -->
                                            <button class="btn btn-primary" type="submit">Acessar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="registrar.php" style="text-decoration: none;">Precisa de uma conta? Cadastre-se!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="adm/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
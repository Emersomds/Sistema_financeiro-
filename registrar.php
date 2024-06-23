<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MoneyMaster</title>
    <link href="adm/assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 200px;">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5" style="background-color: rgba(32, 33, 34, 0.164);">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Criar Conta</h3>
                </div>
                <div id="mensagens" class="mt-3"></div>
                <?php
                
                    if (isset($_SESSION['messages'])) {
                        $messageType = $_SESSION['messages']['type'];
                        $messages = $_SESSION['messages']['messages'];
                        echo '<div class="alert alert-' . $messageType . '" role="alert"><ul><li>' . implode('</li><li>', $messages) . '</li></ul></div>';
                        unset($_SESSION['messages']);
                    }
                ?>
                <div class="card-body">
                    <form id="form" action="adm/actions/registra.php" method="POST">
                        <div class="orm-floating mb-3">                           
                            <div class="form-floating mb-6 mb-md-0">
                                <input class="form-control" name="nome" id="nome" type="text" placeholder="Nome completo" />
                                <label for="inputFirstName">Nome Completo</label>
                             </div>   
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" name="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email </label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="senha" name="senha" type="password" placeholder="Senha" />
                                    <label for="inputPassword">Senha</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="confirmaSenha" name="confSenha" type="password" placeholder="Confirm password" />
                                    <label for="inputPasswordConfirm">Confirmar Senha</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block"  style="text-decoration: none;">Criar Conta</button></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="index.php" style="text-decoration: none;">Tem uma conta? Vá para login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="adm/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="adm/assets/js/scripts.js"></script>
<script src="adm/assets/js/registroValid.js"></script>
</body>
</html>
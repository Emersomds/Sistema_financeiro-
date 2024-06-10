<?php 
@session_start();
if(@$_SESSION['usuarioId'] == ""){
    $_SESSION['loginErro'] = "É necessário fazer login!";
	header("Location: ../");
	exit();
} 
 ?>
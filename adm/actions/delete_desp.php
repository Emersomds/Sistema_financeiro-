<?php
session_start();
include_once('conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_desp = "DELETE FROM despesas WHERE id='$id'";
$resultado_desp = mysqli_query($conn, $result_desp);
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p class='text-success'>Despesa Deletada com sucesso</p>";
		header("Location: ../listaDespesas.php");

    
} else{
    $_SESSION['msg'] = "<p class='text-danger'>Despesa não foi deletada com sucesso</p>";
		header("Location: ../listaDespesas.php");
}
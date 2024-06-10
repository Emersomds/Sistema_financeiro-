<?php
session_start();
include_once('conexao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_rec = "DELETE FROM receitas WHERE id='$id'";
$resultado_rece = mysqli_query($conn, $result_rec);
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p class='text-success'>Receita Deletada com sucesso</p>";
		header("Location: ../listaReceitas.php");

    
} else{
    $_SESSION['msg'] = "<p class='text-danger'>A Receita não foi deletada com sucesso</p>";
		header("Location: ../listarReceitas.php");
}
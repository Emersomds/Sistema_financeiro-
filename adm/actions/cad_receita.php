<?php
session_start();
include_once 'conexao.php';
$id_usuario = $_SESSION['usuarioId'];



$descricao = $_POST['descricao'];
$receita = $_POST['receita'];
$receita = str_replace(',', '.', $receita);
$data_entra = $_POST['data_entra'];
$nome_imagem = $_FILES['arquivo']['name'];

// var_dump( $descricao, $receita, $receita, $data_entra, $nome_imagem);

$result_receit = "INSERT INTO receitas (descricao, valorentrada, document, id_user, data_entra, created) VALUE ('$descricao', '$receita', '$nome_imagem', '$id_usuario', '$data_entra', NOW())";
$result_cad = mysqli_query($conn, $result_receit);


//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../uploads/';

mkdir($_UP['pasta'], 0777);

if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$nome_imagem)){
	$_SESSION['msg'] = "<p class='text-success'>Receita cadastrada com sucesso</p>";
	header("Location: ../listaReceitas.php");
}else{
	$_SESSION['msg'] = "<p class='text-danger'>A receita não foi cadastrada com sucesso</p>";
	header("Location: ../listaReceitas.php");
}
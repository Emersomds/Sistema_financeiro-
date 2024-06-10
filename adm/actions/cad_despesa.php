<?php
session_start();
include_once 'conexao.php';
$id_usuario = $_SESSION['usuarioId'];


if (isset($_POST)){

	$descricao = $_POST['descricao'];
	$despesa = $_POST['despesa'];
	$despesa = str_replace(',', '.', $despesa);
	$data_saida = $_POST['data_saida'];
	$nome_imagem = $_FILES['arquivo']['name'];
	
	// $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	// $despesa = filter_input(INPUT_POST, 'despesa', FILTER_SANITIZE_STRING);
	// $despesa = str_replace(',', '.', $despesa);
	// $data_saida = filter_input(INPUT_POST, 'data_saida', FILTER_SANITIZE_STRING);
	// var_dump($data_saida);
	//echo"Descrição: $descricao <br>";
	//echo"Receita: $despesa <br>";
	//echo"Data: $data_saida <br>";


	$result_saida = "INSERT INTO despesas (descricao, valorsaida, document, id_user, data_saida, created) VALUE ('$descricao', '$despesa', '$nome_imagem', '$id_usuario', '$data_saida', NOW())";
	$result_cad = mysqli_query($conn, $result_saida);

	//Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = '../uploads/';

	mkdir($_UP['pasta'], 0777);

	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$_UP['pasta'].$nome_imagem)){
		$_SESSION['msg'] = "<p class='text-success'>Despesa cadastrada com sucesso</p>";
		header("Location: ../listaDespesas.php");
	}else{
		$_SESSION['msg'] = "<p class='text-danger'>A Despesa não foi cadastrada com sucesso</p>";
		header("Location: ../listaDespesas.php");
	}
}

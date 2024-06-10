<?php

//Credenciais de acesso ao BD
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "moneymaster";

date_default_timezone_set('America/Sao_Paulo');

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

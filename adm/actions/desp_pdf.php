<?php	
@session_start();
require_once("verifica.php");
require_once('conexao.php');
$id_usuario = $_SESSION['usuarioId'];
$name_usuario = $_SESSION['usuarioNome'];

	$html = '<div>';
	$html .= '<h4>'.$name_usuario . "</h4>";
	$html .= '</div>';
	$html .= '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Descrição</th>';
	$html .= '<th>Saida</th>';
	$html .= '<th>Nota</th>';
	$html .= '<th>Data Saida</th>';
    $html .= '<th>Data Cadastro</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>'; 
	
	
	$result_saida = "SELECT * FROM despesas WHERE  id_user = '$id_usuario'";
	$resultado_saida = mysqli_query($conn, $result_saida);
	while($row_saida = mysqli_fetch_assoc($resultado_saida)){
		$html .= '<tr><td>'.$row_saida['id'] . "</td>";
		$html .= '<td>'.$row_saida['descricao'] . "</td>";
		$html .= '<td>'.number_format((float)$row_saida['valorsaida'], 2,'.', ',') . "</td>";
		$html .= '<td>'.$row_saida['document'] . "</td>";
		$html .= '<td>'.$row_saida['data_saida'] . "</td>";
		$html .= '<td>'.$row_saida['created'] . "</td></tr>";		
	} 
	
	$html .= '</tbody>';
	$html .= '</table';
	$html .= '<h3>'.$_SESSION['usuarioNome'] . "</h3>";
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require 'vendor/autoload.php';
	

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->loadHtml('
			<h1 style="text-align: center;">MoneyMarter - Relatório de Despesas</h1>
			'. $html .'	
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_Despesas.pdf", 
		array(
			"Attachment" => true//Para realizar o download somente alterar para true
		)
	);
?>

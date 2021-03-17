<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
	if(!isset ($_POST['id']))
			die("Forma de chamada da rotina de gravação incorreta!!");
	$codigo = $_POST['id'];
	
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$email = $_POST["email"];
	$plano = $_POST["plano"];
	$pagamento = $_POST["pagamento"];
	$obs = $_POST["obs"];

	echo "O nome do paciente: $nome <br>";
	echo "O CPF do paciente: $cpf <br>";
	echo "O email do paciente: $email <br>";
	echo "O plano: $plano <br>";
	echo "A forma de pagamento: $pagamento <br>";
	echo "Observações:<br> $obs";

	include "conexao.php";
	
	$sql = "UPDATE financeiro SET
	nome = '$nome',
	cpf = '$cpf',  
	email = '$email',   
	plano = '$plano',
	pagamento = '$pagamento',
	obs = '$obs'";
	
	$sql .= " WHERE id = '$codigo'";
	echo "<hr>Comando SQL: <br> $sql <br>" ;
	
	mysqli_query($con, $sql) or die('Erro na atualização dos dados do
	cadastro financeiro $codigo:' . mysqli_error($con) );
			
	echo "Dados alterados com sucesso <hr>";
	echo "<a href='listaFinanceiro.php'>Ir para a pagina de listagem</a>"
?>
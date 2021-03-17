<?php header("Content-Type: text/html; charset=ISO-8859-1",true);

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
	
	$sql = "INSERT INTO financeiro 
	(nome,     cpf,    email,    plano, pagamento, obs) VALUES
	('$nome', '$cpf', '$email', '$plano', '$pagamento', '$obs')";
	
	echo "<hr>Comando SQL: <br> $sql <br>" ;
	
	mysqli_query($con, $sql) or 
		die("Erro na inserção de registro no banco:" .
			mysqli_error($con) );
			
	echo "Dados gravados com sucesso!";
	echo "<a href='listaFinanceiro.php'>Ir para a pagina de listagem</a>"
?>
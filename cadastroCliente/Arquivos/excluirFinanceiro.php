<?php header("Content-Type: text/html; charset=ISO-8859-1",true);

	echo "<h2>Rotina de Exclus�o de Cadastro Financeiro</h2>";
	$codigo = $_GET['c'];
	echo "Vou excluir o financeiro c�digo: $codigo <br>";
	
	include "conexao.php";
			
	$sql = "DELETE FROM financeiro WHERE id=$codigo";
	
	mysqli_query($con, $sql) or 
		die("Erro na exclus�o do financeiro $codigo:" .
			mysqli_error($con)  );
			
	echo "Financeiro $codigo eliminado com sucesso";
	echo "<hr>";
	echo "<a href='listaFinanceiro.php'>Listagem de Financeiro</a>";
?>
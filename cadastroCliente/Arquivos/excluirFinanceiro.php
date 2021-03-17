<?php header("Content-Type: text/html; charset=ISO-8859-1",true);

	echo "<h2>Rotina de Exclusão de Cadastro Financeiro</h2>";
	$codigo = $_GET['c'];
	echo "Vou excluir o financeiro código: $codigo <br>";
	
	include "conexao.php";
			
	$sql = "DELETE FROM financeiro WHERE id=$codigo";
	
	mysqli_query($con, $sql) or 
		die("Erro na exclusão do financeiro $codigo:" .
			mysqli_error($con)  );
			
	echo "Financeiro $codigo eliminado com sucesso";
	echo "<hr>";
	echo "<a href='listaFinanceiro.php'>Listagem de Financeiro</a>";
?>
<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
	
	include "conexao.php";
	
	$sql="SELECT * FROM financeiro";
	
	$registros = mysqli_query($con, $sql) or 
		die("Erro na seleção de registros:" . 
				mysqli_error($con)  );
	
	$linhas = mysqli_num_rows($registros);
	
	if ( $linhas < 1)
	  die("Cadastro financeiro vazio. Sistema Encerrado" . "<a href='cadFinanceiro.html'> Voltar para a página de cadastro</a>");
	
	$contador = 0;
	
	echo "<table border='1'>";
	echo "		<tr>";
	echo "			<th>Código</th>";
	echo "			<th>Nome</th>";
	echo "			<th>CPF</th>";
	echo "			<th>E-mail</th>";
	echo "			<th>Plano</th>";
	echo "			<th>Forma de Pagamento</th>";
	echo "			<th>Obs</th>";
	echo "			<th colspan='2'>Ações</th>";
	echo "		</tr>";
	
	while ($contador < $linhas)
	{
		$dados = mysqli_fetch_array($registros) ;

		$codigo = $dados["id"];
		$nome	= $dados["nome"];
		$cpf = 	  $dados["cpf"];
		$email =  $dados["email"];
		$plano =  $dados["plano"];
		$pagamento = $dados["pagamento"];
		$obs = $dados["obs"];

		echo "<tr>";
		
		echo "<td>$codigo</td>";
		echo "<td>$nome</td>";
		echo "<td>$cpf</td>";
		echo "<td>$email</td>";
		echo "<td>$plano</td>";
		echo "<td>$pagamento</td>";
		echo "<td>$obs</td>";
		echo "<td> <a href='excluirFinanceiro.php?c=$codigo'>Excluir</a> </td>";
		echo "<td> <a href='alterarFinanceiro.php?c=$codigo'>Alterar</a> </td>";
		
		echo "</tr>";
		
		$contador++;
	}
	
	echo "</table>";
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="styleFinanceiro.css">
    <title>Pagamento</title>
</head>

    <body>
	<header color="#E25822" id="faixa">
            <h4 id="txtF">Formulário de Cadastro - Cliente</h4>	
            </header>
            <div id="menu">
				<div id="fun" class="efeito efeitof-1">
					<a href="C:\wamp64\www\[2A MATUTINO] GoogluStation\GUILHERME BELMONTE ROCHA [20594453]\ARQUIVOS\cadastrofuncionario.html">Funcion&aacute;rio</a>
				</div>
				<div id="pron" class="efeito efeito-1">
					<a href="">Prontu&aacute;rio</a>
				</div>
				<div id="fin" class="efeito efeito-1">
						<a href="C:\wamp64\www\[2A MATUTINO] GoogluStation\Maurício Naoki Nakamura [20691564]\Arquivos\cadFinanceiro.html">Financeiro</a>
					</div>
				<div id="age" class="efeito efeitoa-1">
					<a href="C:\wamp64\www\[2A MATUTINO] GoogluStation\Bryan de Lima Carvalho [2130415-7]\Arquivos\agenda.html">Agenda</a>
				</div>	
            </div>
			<?php header("Content-Type: text/html; charset=ISO-8859-1",true);

			if( !isset($_GET['c']) )
				die("Rotina chamada de forma incorreta");
			
			$codigo = $_GET['c'];

			include "conexao.php";
			
			$sql = "SELECT * FROM financeiro WHERE id=$codigo";
			
			$registro = mysqli_query($con, $sql);

			$linhas = mysqli_num_rows($registro);
			
			if ($linhas < 1)
				die("Time não encontrado (excluído?).");
			
			$dados = mysqli_fetch_array($registro);
			
			$nome 		=	$dados['nome'] ;
			$cpf		=	$dados['cpf'] ;
			$email		=	$dados['email'];
			$plano 		= 	$dados["plano"];
			$pagamento 	=	$dados["pagamento"];
			$obs 		= 	$dados["obs"];
		?>
		
        <h2 class="pag">Efetuar o pagamento</h2>
		<div id="pagf">
        <form class="formulario" action="gravarAlteracaoFinanceiro.php" method="post" enctype="multipart/form-data">
		<input	type="hidden"
				name="id"
				value="<?php echo $codigo; ?>">
            Nome:
            <input type="text"
                   name="nome"
                   id="nome"
				   class="borda"
                   maxlength="80"
                   size="80"
                   placeholder=" Coloque o seu nome completo aqui"
                   value="<?php echo $nome; ?>"
				   required>
            <br><br>
            CPF:
            <input type="text"
                   name="cpf"
                   id="cpf"
				   class="borda bordaCpf"
                   maxlength="14"
                   size="14"
				   placeholder="Ex: 000.000.000-00"
				   value="<?php echo $cpf; ?>"
                   required>
            <br><br>
            Email:
            <input type="email"
                   name="email"
                   id="email"
				   class="borda"
                   maxlength="100"
                   placeholder="exemplo@gmail.com"
				   value="<?php echo $email; ?>"
                   required>
            <br><br>
            <fieldset>
                <legend>Selecione o plano desejado</legend>
				
				<?php
					$check1 = "";
					$check2 = "";
					$check3 = "";
					
					if ($plano == "Pagamento único de R$ 500,00")
						$check1 = "checked";
					if ($plano == "Parcelar em 5x de R$ 105,00")
						$check2 = "checked";
					if ($plano == "Parcelar em 10x de R$ 60,00")
						$check3 = "checked";
				?>
				
                <input type="radio"
                       name="plano"
                       id="plano"
                       value="Pagamento único de R$ 500,00"
					   <?php echo $check1; ?>
                       checked>Pagamento único de R$ 500,00<br><br>
                <input type="radio"
                       name="plano"
                       id="plano"
                       value="Parcelar em 5x de R$ 105,00"
					   <?php echo $check2; ?>>Parcelar em 5x de R$ 105,00<br><br>
                <input type="radio"
                       name="plano"
                       id="plano"
                       value="Parcelar em 10x de R$ 60,00"
					   <?php echo $check3; ?>>Parcelar em 10x de R$ 60,00
					   
                <hr>
               
				<?php
				$opcaoDinheiro = "";
				$opcaoBoleto = "";
				$opcaoVisa = "";
				$opcaoMastercard = "";
				$opcaoPagseguro = "";
				
				if ($pagamento == "Dinheiro")
					$opcaoDinheiro = "selected";
				if ($pagamento == "Boleto Bancário")
					$opcaoBoleto = "selected";
				if ($pagamento == "Cartão de crédito - Visa")
					$opcaoVisa = "selected";
				if ($pagamento == "Cartão de crédito - Mastercard")
					$opcaoMastercard = "selected";
				if ($pagamento == "Pagseguro")
					$opcaoPagseguro = "selected";
				?>
				
				Selecione a forma de pagamento:
                <select name="pagamento" required>
                    <option value="">Escolha</option>
                    <option value="Dinheiro"  <?php echo $opcaoDinheiro; ?> > Dinheiro </option>
                    <option value="Boleto Bancário" <?php echo $opcaoBoleto; ?> > Boleto Bancário </option>
                    <option value="Cartão de crédito - Visa" <?php echo $opcaoVisa; ?> > Cartão de crédito - Visa </option>
                    <option value="Cartão de crédito - Mastercard" <?php echo $opcaoMastercard; ?> > Cartão de crédito - Mastercard </option>
                    <option value="Pagseguro" <?php echo $opcaoPagseguro; ?> > Pagseguro </option>
                </select>
            </fieldset>
            <br>
            Observações:<br>
            <textarea name="obs"
                      id="obs"
					  class="borda bordaObs"
                      cols="50"
                      rows="10"><?php echo $obs; ?>
                    </textarea>
            <br>
            <hr>
            <input type="submit" value="Alterar" style="margin-top: 8px; margin-left: 225px; margin-right: 5px;">
            <input type="reset" value="Limpar">
        </form>
		</div>
		<div class="rodap">
                <h4>Ajuda</h4>
                <ul>
                    <li> <a href="faleconosco.html">Fale Conosco</a> </li>
                </ul>
                <h4>Sobre</h4>
                <ul>
                    <li> <a href="nossaempresa.html">Nossa Empresa</a> </li>
                </ul>
                <h4>Carreira</h4>
                <ul class="ul1" style="position: relative; right: 75px;">	
                    <li> <a href="coaching.html">Coaching</a> </li>
                    <li> <a href="intercambio.html">Intercâmbio</a> </li>
                    <li> <a href="treinamento.html">Treinamentos</a> </li>
                </ul>
            </div>
    </body>
</html>
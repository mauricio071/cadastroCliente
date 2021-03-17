<?php

	$con=mysqli_connect("localhost","root","");
			
	mysqli_select_db($con, "googlu") or
		die("Erro na abertura do banco: " .
			mysqli_error($con) );
?>
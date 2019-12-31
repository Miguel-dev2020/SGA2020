<?php
	$servidor = "localhost";
	$utilizador = "root";
	$senha = "";
	$bdname = "bd-sga";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $utilizador, $senha, $bdname) or trigger_error(mysql_error(),E_USER_ERROR); 
	if(!$conn){
		die("Falha de conexao com o Servidor: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}	
	
?>


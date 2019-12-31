<?php
	session_start();
	
	unset(
		$_SESSION['utilizadorId'],
		$_SESSION['utilizador'],
		$_SESSION['utilizadorNiveisAcessoId'],
		$_SESSION['utilizadorEmail'],
		$_SESSION['utilizadorSenha']
	);
	
	$_SESSION['Terminar_login'] = "Terminou Sessão com sucesso";
	//Redirecionar o utilizador para a página de login
	header("Location: ../views/index.php");
?>
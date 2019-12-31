<?php 
session_start();
//incluir a canexão
        require_once("../views/connect.php");
//declarar as variáveis
$utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$situacao = filter_input(INPUT_POST, 'situacoe_id', FILTER_SANITIZE_STRING);
$niveldeacesso = filter_input(INPUT_POST, 'niveis_acesso_id', FILTER_SANITIZE_STRING);
$datacriacao = filter_input(INPUT_POST, 'dt_criacao', FILTER_SANITIZE_STRING);
$datamodificacao = filter_input(INPUT_POST, 'dt_modificacao', FILTER_SANITIZE_STRING);
$result_utilizador = "INSERT INTO utilizadores (utilizador, email, senha, situacoe_id, niveis_acesso_id, dt_criacao, dt_modificacao created) 
VALUES ('$utilizador', '$email','$senha','$situacoe_id','$niveis_acesso_id','$dt_criacao', '$dt_modificacao' NOW())";
$resultado_utilizador = mysqli_query($conn, $result_utilizador);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Utilizador registrado com sucesso</p>";
	header("Location: ../views/utilizador.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Utilizador não foi registrado</p>";
	header("Location: ../views/utilizador.php");
}
?>
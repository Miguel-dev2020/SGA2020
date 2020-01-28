<?php
	require_once("../views/connect.php");
	
	$utilizador = mysqli_real_escape_string($conn, $_POST['utilizador']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, md5($_POST['senha']));
	$situacoe_id = mysqli_real_escape_string($conn, $_POST['situacoe_id']);
	$niveis_acesso_id = mysqli_real_escape_string($conn, $_POST['niveis_acesso_id']);
	$dt_criacao = mysqli_real_escape_string($conn, $_POST['dt_criacao']);
	$dt_modificacao = mysqli_real_escape_string($conn, $_POST['dt_modificacao']);
	$result_utilizadores = "INSERT INTO utilizadores (id, utilizador, email, senha, situacoe_id, niveis_acesso_id, dt_criacao, dt_modificacao) VALUES (Null,'$utilizador', '$email','$senha','$situacoe_id','$niveis_acesso_id','$dt_criacao','$dt_modificacao' )";	
	$resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
        
        if(mysqli_insert_id($conn)){
                $_SESSION['msg'] = "<p style='color:green;'>Utilizador registrado com sucesso</p>";
                header("Location: index.php");
        }else{
                $_SESSION['msg'] = "<p style='color:red;'> Não foi registrar o Utilizador </p>";
                header("Location: cad_usuario.php");
        }


        header("Location: ../views/utilizador.php");       

?>

<!--DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> </?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/bda2020/views/utilizador.php'>
				<script type=\"text/javascript\">
					alert(\"Registro efetuado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/bda2020/views/utilizador.php'>
				<script type=\"text/javascript\">
					alert(\"Registro sem Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
</?php $conn->close(); ?-->
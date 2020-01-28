<?php
	require_once("../views/connect.php");
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $situacoe_id = filter_input(INPUT_POST, 'situacoe_id', FILTER_SANITIZE_STRING);
        $niveis_acesso_id = filter_input(INPUT_POST, 'niveis_acesso_id', FILTER_SANITIZE_STRING);
        $dt_criacao = filter_input(INPUT_POST, 'dt_criacao', FILTER_SANITIZE_STRING);
        $dt_modificacao = filter_input(INPUT_POST, 'dt_modificacao', FILTER_SANITIZE_STRING);
        
        
        //$id = mysqli_real_escape_string($conn, $_POST['id']);
	//$utilizador = mysqli_real_escape_string($conn, $_POST['utilizador']);
	//$email = mysqli_real_escape_string($conn, $_POST['email']);
	//$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	//$situacoe_id = mysqli_real_escape_string($conn, $_POST['situacoe_id']);
	//$niveis_acesso_id = mysqli_real_escape_string($conn, $_POST['niveis_acesso_id']);
	//$dt_criacao = mysqli_real_escape_string($conn, $_POST['dt_criacao']);
	//$dt_modificacao = mysqli_real_escape_string($conn, $_POST['dt_modificacao']);
	
	$result_utilizadores = "UPDATE utilizadores SET utilizador='$utilizador', email='$email', senha='$senha', situacoe_id='$situacoe_id', niveis_acesso_id='$niveis_acesso_id', dt_criacao='$dt_criacao', dt_modificacao='$dt_modificacao' modified=NOW() WHERE id = '$id'";	
	$resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
       
        if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Utilizador editado com sucesso</p>";
	header("Location: ../views/utilizador.php");
        }else{
	$_SESSION['msg'] = "<p style='color:red;'>Utilizador não foi editado com sucesso</p>";
	header("Location: ../views/utilizador.php?id=$id");
        }

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
					alert(\"Registro atualizado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/bda2020/views/utilizador.php'>
				<script type=\"text/javascript\">
					alert(\"Registro não foi atualizado.\");
				</script>
			";	
		}?>
	</body>
</html>
</?php $conn->close(); ?-->
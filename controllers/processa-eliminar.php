<?php
	require_once("../views/connect.php");
	
	//$id = $_GET['id'];
	
	//$result_utilizadores = "DELETE FROM utilizadores WHERE id = '$id'";
	//$resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
        
        if(!empty($id)){
                $result_utilizadores = "DELETE FROM utilizador WHERE id='$id'";
                $resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
                if(mysqli_affected_rows($conn)){
                        $_SESSION['msg'] = "<p style='color:green;'>Utilizador apagado com sucesso</p>";
                        header("location: ../views/utilizador.php");
                }else{

                        $_SESSION['msg'] = "<p style='color:red;'>Erro o utilizador não foi apagado com sucesso</p>";
                        header("location: ../views/utilizador.php");
                }
        }else{	
                $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um utilizador</p>";
                header("location: ../views/utilizador.php");
        }



//Voltar para a pagina index
        //header("location: ../views/utilizador.php");
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
					alert(\"Registro apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/bda2020/views/utilizador.php'>
				<script type=\"text/javascript\">
					alert(\"Registro não foi apagado.\");
				</script>
			";	
		}?>
	</body>
</html>
</?php $conn->close(); ?-->
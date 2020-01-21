<?php
	require_once("../views/connect.php");
	
	$id = $_GET['id'];
	
	$result_utilizadores = "DELETE FROM utilizadores WHERE id = '$id'";
	$resultado_utilizadores = mysqli_query($conn, $result_utilizadores);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
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
<?php $conn->close(); ?>
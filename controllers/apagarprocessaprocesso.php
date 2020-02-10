<?php 
require_once("../views/connect.php");
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_correspondencia = "DELETE FROM correspondencia WHERE id='$id'";
	$resultado_correspondencia = mysqli_query($conn, $result_correspondencia);
	
        if(mysqli_affected_rows($conn)){
		$_SESSION['message'] = "<p style='color:green;'>Processo eliminado com sucesso</p>";
                $_SESSION['msg_type'] = "success";
		header("Location: ../views/entradadeprocessos.php");
	}else{
		
		$_SESSION['message'] = "<p style='color:red;'>Erro o processo não foi eleminado com sucesso</p>";
                $_SESSION['msg_type'] = "warning";
		header("Location: ../views/entradadeprocessos.php");
	}
}else{	
	$_SESSION['message'] = "<p style='color:red;'>Necessário selecionar um processo</p>";
        $_SESSION['msg_type'] = "warning";
	header("Location: ../views/entradadeprocessos.php");
}
?>
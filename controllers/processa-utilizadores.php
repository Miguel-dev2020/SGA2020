<?php
        
        require_once("../views/connect.php");
        //ssetion_start();

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $utilizador = filter_input(INPUT_POST, 'utilizador', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $situacoe_id = filter_input(INPUT_POST, 'situacoe_id', FILTER_SANITIZE_STRING);
        $niveis_acesso_id = filter_input(INPUT_POST, 'niveis_acesso_id', FILTER_SANITIZE_STRING);
        $dt_criacao = filter_input(INPUT_POST, 'dt_criacao', FILTER_SANITIZE_STRING);
        $dt_modificacao = filter_input(INPUT_POST, 'dt_modificacao', FILTER_SANITIZE_STRING);
        
        
        $result_utilizadores = "UPDATE utilizadores SET utilizador='$utilizador', email='$email', senha='$senha', situacoe_id='$situacoe_id', niveis_acesso_id='$niveis_acesso_id', dt_criacao='$dt_criacao', dt_modificacao='$dt_modificacao' WHERE id = '$id'";	
	$resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
       
        if(mysqli_affected_rows($conn)){
            $_SESSION['message'] = "<p style='color:green;'>Utilizador editado com sucesso</p>";
            $_SESSION['msg_type'] ="success";
            $destino = header("Location: ../views/utilizador.php");
        }else{
            $_SESSION['message'] = "<p style='color:red;'>Utilizador não foi editado com sucesso</p>";
            $_SESSION['msg_type'] = "warning";
            $destino = header("Location: ../views/utilizador.php?id=$id");
        }
?>

<?php
	require_once("../views/connect.php");
	session_start();
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if(!empty($id)){
                $result_utilizadores = "DELETE FROM utilizadores WHERE id='$id'";
                $resultado_utilizadores= mysqli_query($conn, $result_utilizadores);
                if(mysqli_affected_rows($conn)){
                        $_SESSION['message'] = "<p style='color:green;'>Utilizador apagado com sucesso</p>";
                        $_SESSION['msg_type'] ="success";
                        $destino = header("Location: ../views/utilizador.php");
                }else{

                        $_SESSION['message'] = "<p style='color:red;'>Erro o utilizador não foi apagado com sucesso</p>";
                        $_SESSION['msg_type'] = "warning";
                        $destino = header("Location: ../views/utilizador.php");
                }
        }else{	
                $_SESSION['message'] = "<p style='color:red;'>Necessário selecionar um utilizador</p>";
                $_SESSION['msg_type'] = "warning";
                $destino = header("Location: .../views/utilizador.php");
        }
?>
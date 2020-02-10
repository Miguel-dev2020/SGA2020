<?php
        //Arquivo para realização de inserção de dados na Base de Dados
       require_once("../views/connect.php");
       session_start();
       $id=0;
       $utilizador = $_POST['utilizador'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $situacoe_id = $_POST['situacoe_id'];
       $select_niveis_acesso = $_POST['select_niveis_acesso'];
       $dt_criacao = $_POST['dt_criacao'];
       $dt_modificacao = $_POST['dt_modificacao'];

       $sql = $mysqi->prepare("INSERT INTO utilizadores VALUES(?,?, ?, ?, ?, ?, ?, ?)");	
       $sql->bind_param("isssssss", $id, $utilizador, $email, $senha, $situacoe_id, $select_niveis_acesso, $dt_criacao, $dt_modificacao);
       
       $sql->execute();
       $sql->store_result();
       $result=$sql->affected_rows;

       if($result>0){
               $_SESSION['message'] = "<p style='color:green;'>Utilizador cadastrado com sucesso</p>";
               $_SESSION['msg_type'] ="success";
               $destino = header("Location:  ../views/utilizador.php");
       }else{
               $_SESSION['message'] = "<p style='color:red;'>Utilizador não foi cadastrado com sucesso</p>";
               $_SESSION['msg_type'] = "warning";
               $destino = header("Location: ../views/utilizador.php");
       }   	

?>
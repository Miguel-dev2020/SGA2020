<?php
//start de sessão
//session_start();
//conexão com a base de dados
$mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
    $id=0;
    $update = false;
    //atribuir o valor vaziu para os campos do formulário
    $utilizador = '';
    $email = '';
    $senha = '';
    $situacoe_id = '';
    $niveis_acesso_id = '';
    $dt_criacao = '';
    $dt_modificacao = '';
    if (isset($_POST['guardar'])){
        $utilizador = $_POST['utilizador'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $situacoe_id = $_POST['situacoe_id'];
        $niveis_acesso_id = $_POST['niveis_acesso_id'];
        $dt_criacao = $_POST['dt_criacao'];
        $dt_modificacao = $_POST['dt_modificacao'];
        //mensagem do resgistro guardado
        $_SESSION['message'] = "O seu registro foi bem guardado!"; 
        $_SESSION['msg_type'] = "success";

        //Voltar para a pagina index
        header("location: ../views/utilizador.php");
        
        //enviar dados para a base de dados  
            $mysqli->query("INSERT INTO utilizadores (utilizador, email, senha, situacoe_id, niveis_acesso_id, dt_criacao, dt_modificacao)VALUES('$utilizador', '$email', '$senha', '$situacoe_id', '$niveis_acesso_id', '$dt_criacao', '$dt_modificacao')") 
                    or die($mysqli->error);
    }
    //apagar dados da base de dados 
    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM utilizadores WHERE id = $id") or die($mysqli->error());
        
        //mensagem do resgistro guardado
        $_SESSION['message'] = "Um registro foi bem eliminado!"; 
        $_SESSION['msg_type'] = "danger";

        //Voltar para a pagina index
        header("location: ../views/utilizador.php");
    } 
    
    //veficar o botão fazer comparação e atualizar registro na base de dados 
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM utilizadores WHERE id = $id") or die($mysqli->error());
        if(count($result)==1){
            $row = $result->fetch_array();
            $utilizador = $row['utilizador'];
            $email = $row['email'];
            $senha = $row['senha'];
            $situacoe_id = $row['situacoe_id'];
            $niveis_acesso_id = $row['niveis_acesso_id'];
            $dt_criacao = $row['dt_criacao'];
            $dt_modificacao = $row['dt_modificacao'];
        
    }
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];
        $utilizador = $_POST['utilizador'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $situacoe_id = $_POST['situacoe_id'];
        $niveis_acesso_id = $_POST['niveis_acesso_id'];
        $dt_criacao = $_POST['dt_criacao'];
        $dt_modificacao = $_POST['dt_modificacao'];
        
        //atualização dos dados
        $mysqli->query("UPDATE utilizadores SET utilizador='$utilizador', email='$email', senha='$senha', situacoe_id='$situacoe_id', niveis_acesso_id='$niveis_acesso_id', dt_criacao='$dt_criacao', dt_modificacao='$dt_modificacao' WHERE id=$id") or die($mysqli->error);
    
        //mensagem do resgistro guardado
        $_SESSION['message'] = "O seu registro foi bem atualizado!"; 
        $_SESSION['msg_type'] = "warning";
        //Voltar para a pagina index
        header("location: ../views/utilizador.php");
    }
?>
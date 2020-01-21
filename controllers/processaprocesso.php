<?php
//start de sessão
//session_start();
//conexão com a base de dados
    $mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
    $Num_Alvara=0;
    $update = false;
    //atribuir o valor vaziu para os campos do formulário
    $Dt_Emissao = '';
    $Dt_Validade = '';
    $Descricao = '';
    $Tp_Alvara_id = '';
    $Estabelecimento_id = '';

    if (isset($_POST['guardar'])){
        $Num_Alvara = $_POST['Num_Alvara'];
        $Dt_Emissao = $_POST['Dt_Emissao'];
        $Dt_Validade = ['Dt_Validade'];
        $Descricao = $_POST['Descricao'];
        $Tp_Alvara_id = $_POST['Tp_Alvara_id'];
        $Estabelecimento_id = $_POST['Estabelecimento_id'];
       
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
        $Num_Alvara = $_GET['delete'];
        $mysqli->query("DELETE FROM alvara WHERE Num_Alvara = $Num_Alvara") or die($mysqli->error());
        
        //mensagem do resgistro guardado
        $_SESSION['message'] = "Um registro foi bem eliminado!"; 
        $_SESSION['msg_type'] = "danger";

        //Voltar para a pagina index
        header("location: ../views/entradadeprocessos.php");
    } 
    
    //veficar o botão fazer comparação e atualizar registro na base de dados 
    if (isset($_GET['edit'])){
        $Num_Alvara = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM alvara WHERE Num_Alvara = $Num_Alvara") or die($mysqli->error());
        if(count($result)==1){
            $row = $result->fetch_array();
            $Dt_Emissao = $row['Dt_Emissao'];
            $Dt_Validade = $row['Dt_Validade'];
            $Descricao = $row['Descricao'];
            $Tp_Alvara_id = $row['Tp_Alvara_id'];
            $Estabelecimento_id = $row['Estabelecimento_id'];

        
    }
    }
    if (isset($_POST['update'])){
            $Num_Alvara = $_POST['Num_Alvara'];
            $Dt_Emissao = $row['Dt_Emissao'];
            $Dt_Validade = $row['Dt_Validade'];
            $Descricao = $row['Descricao'];
            $Tp_Alvara_id = $row['Tp_Alvara_id'];
            $Estabelecimento_id = $row['Estabelecimento_id'];
        
        //atualização dos dados
        $mysqli->query("UPDATE alvara SET Num_Alvara='$Num_Alvara', Dt_Emissao='$Dt_Emissao', Dt_Validade='$Dt_Validade', Tp_Alvara_id='$Tp_Alvara_id', Estabelecimento_id='$Estabelecimento_id' WHERE Num_Alvara=$Num_Alvara") or die($mysqli->error);
    
        //mensagem do resgistro guardado
        $_SESSION['message'] = "O seu registro foi bem atualizado!"; 
        $_SESSION['msg_type'] = "warning";
        //Voltar para a pagina index
        header("location: ../views/entradadeprocessos.php");
    }
?>
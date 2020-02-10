<?php

    require_once("../views/connect.php");
    //Verificar se a sessão já se encontra aberta e iniciar.
        //if (session_status() !== PHP_SESSION_ACTIVE){
          //iniciar a sessão
   //session_start();
   //Eliminar uma sessão
    //unset($_SESSION['utilizador']);} 
  


  
    
    //conexão com a base de dados
    $mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));

    $id=0;
    $update = false;
    //atribuir o valor vaziu para os campos do formulário
    $Nome_Estabelecimento = '';
    $Num_Nota = '';
    $Dt_Correspondencia = '';
    $Num_Entrada = '';
    $Dt_Entrada = '';
    $Descricao = '';
    
    if (isset($_POST['guardar'])){
        $Nome_Estabelecimento = $_POST['Nome_Estabelecimento'];
        $Num_Nota = $_POST['Num_Nota'];
        $Dt_Correspondencia = $_POST['Dt_Correspondencia'];
        $Num_Entrada = $_POST['Num_Entrada'];
        $Dt_Entrada = $_POST['Dt_Entrada'];
        $dt_criacao = $_POST['dt_criacao'];
        $Descricao = $_POST['Descricao'];

        //mensagem do resgistro guardado
        $_SESSION['message'] = "O seu registro foi bem guardado!"; 
        $_SESSION['msg_type'] = "success";

        //Voltar para a pagina index
        $destino = header("Location: ../views/entradadeprocessos.php");
        
        //enviar dados para a base de dados 

	$mysqli->query("INSERT INTO `correspondencia` (`id`, `Nome_Estabelecimento`, `Num_Nota`, `Dt_Correspondencia`, `Num_Entrada`, `Dt_Entrada`, `Descricao`) VALUES (NULL, '$Nome_Estabelecimento', '$Num_Nota', '$Dt_Correspondencia', '$Num_Entrada', '$Dt_Entrada','$Descricao')") 
                    or die($mysqli->error);	
        
    }
    //apagar dados da base de dados 
    //if (isset($_GET['delete'])){
       // $id = $_GET['delete'];
       // $mysqli->query("DELETE FROM correspondencia WHERE id = $id") or die($mysqli->error());
        
        //mensagem do resgistro guardado
        //$_SESSION['message'] = "Um registro foi bem eliminado!"; 
        //$_SESSION['msg_type'] = "danger";

        //Voltar para a pagina index
        //header("Location: ../views/entradadeprocessos.php");
    //} 
    
    //veficar o botão fazer comparação e atualizar registro na base de dados 
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM correspondencia WHERE id = $id") or die($mysqli->error());
        if(count($result)==1){
            $row = $result->fetch_array();
            $Nome_Estabelecimento = $row['Nome_Estabelecimento'];
            $Num_Nota = $row['Num_Nota'];
            $Dt_Correspondencia = $row['Dt_Correspondencia'];
            $Num_Entrada = $row['Num_Entrada'];
            $Dt_Entrada = $row['Dt_Correspondencia'];
            $Descricao = $row['Descricao'];
            
        
    }
    }
    if (isset($_POST['update'])){
        $id = $_POST['id'];
        $Nome_Estabelecimento = $_POST['Nome_Estabelecimento'];
        $Num_Nota = $_POST['Num_Nota'];
        $Dt_Correspondencia = $_POST['Dt_Correspondencia'];
        $Num_Entrada = $_POST['Num_Entrada'];
        $Dt_Entrada = $_POST['Dt_Correspondencia'];
        $Descricao = $_POST['Descricao'];
        
        //atualização dos dados
        $mysqli->query("UPDATE correspondencia SET Nome_Estabelecimento='$Nome_Estabelecimento', Num_Nota='$Num_Nota', Dt_Correspondencia='$Dt_Correspondencia', Num_Entrada='$Num_Entrada', Dt_Entrada='$Dt_Entrada', Descricao='$Descricao' WHERE id=$id") or die($mysqli->error);
    
        //mensagem do resgistro guardado
        $_SESSION['message'] = "O seu registro foi bem atualizado!"; 
        $_SESSION['msg_type'] = "warning";
        //Voltar para a pagina index
        $destino = header("Location: ../views/entradadeprocessos.php");
    }
?>
<?php 
session_start();
//incluir a canexão
        require_once("../views/connect.php");
        $id = filter_input(INPUT_POST, 'utilizador',FILTER_SANITIZE_STRING);
        $utilizador = filter_input(INPUT_POST, 'utilizador',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);
        $situacao = filter_input(INPUT_POST, 'situacoe_id',FILTER_SANITIZE_NUMBER_INT);
        $nivelDeAcesso = filter_input(INPUT_POST, 'niveis_acesso_id',FILTER_SANITIZE_NUMBER_INT);
        $dtcriacao = filter_input(INPUT_POST, 'dt_criacao',FILTER_SANITIZE_STRING);
        $dtmodificacao = filter_input(INPUT_POST, 'dt_modificacao',FILTER_SANITIZE_STRING);

$result_msg_utilizador = "UPDATE utilizadores SET (id='$id', utilizador='$utilizador', email='$email', situacoe_id='$situacao', niveis_acesso_id='$nivelDeAcesso', dt_criacao='$dtcriacao', dt_modificacao='$dtmodificacao')  modified=NOW()) where id='$id'";

$resultado_msg_utilizador = mysqli_query($conn,$result_msg_utilizador);

//mensagen de confirmação
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>O utilizador foi editado com sucesso</p>";
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Falha!!! O utilizador não foi editado</p>";
    header("Location: ../views/utilizador.php?id='$id'");
}
 ?>

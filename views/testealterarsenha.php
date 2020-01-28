<?php 

include("../views/connect.php");

if(isset($_POST['Alterar'])){
    
    // vereficar se email enviado é valido
   $email = $mysqli->escape_string($_POST['email']);
   
   if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
       
       $erro[] = "Email Inválido.";
     
   }
   //verivicar se o email valido existe na base de dados
   
   $result_utilizador = "SELECT utilizador, senha FROM utilizadores WHERE email = '$_SESSION[$email]'";
   $sql_query = $mysqli->query($result_utilizador) or die ($mysqli->error);
   $dado = $sql_query->fetch_assoc();
   $total = $sql_query->num_rows;
   
   if ($total == 0)
       $erro[] = "o email informado não existe na nossa base de dados";
       

   //Sendo email valido efectuar a operação
   if (count($erro) == 0 && $total > 0){
       
        $novasenha = substr(md5(time()), 0, 8);
        $nscriptografada = md5(md5($novasenha));


        //so altera senha na bd se a senha vor enviada
        if(mail($email, "Sua nova Senha", "Sua nova Senha:".$novasenha));{

        $sql_cod = "UPDATE utilizadores SET senha = '$nscriptografada' Where email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
        
        if($sql_query)
            $erro[] = "Senha Alterado Com sucesso";

        }
        }  
    
}


?>

<form method="POST" action="">
    
    <input value="" placeholder="seu email" name="email" type="text">
    <input name="Alterar" value="Alterar" type="submit">
    
</form>
<?php 
require_once("../views/connect.php");

// Recuperar o id do utilizador passado vai GET
//$idutilizador = $_GET['id'];
 
// Query de consulta de utilizador passando o ID
$query = "select * from utilizadores";
 
// Executando a Query na base de dados
$result = mysql_query($query,$conn) or die(mysql_error());

 
// Populando um Array com o resultado da Consulta
$row = mysql_fetch_array($result);
 
// Populando os campos recuperados na consulta
$utilizador= $row['utulizador'];
$email = $row['email'];
$senha = $row['senha'];
$situacoe = $row['situacoe_id'];
$NivelDeAcesso = $row['niveis_acesso_id'];
$DataCriacao = $row['dt_criacao'];
$DataModificacao = $row['dt_modificacao'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="teste_updt.php">
    <input type="hidden" name="txtid" value="<? echo $id; ?>">
  <fieldset><legend><b>Registrar Utilizadores</b></legend>
    
    
 
  
    
  <p>
    <label for="textfield">utilizador:</label>
    <input name="textfield" type="text" id="textfield" value="<?php echo $utilizador; ?>">
    <label for="email">Email:</label>
    <input name="email" type="email" id="email" value="<?php echo $email; ?>">
  
    <label for="password">Senha:</label>
    <input name="password" type="password" id="password" value="<?php echo $senha; ?>">
  </p>
  <p>
    <label for="textfield2">situação:</label>
    <input name="textfield2" type="text" id="textfield2" value="<?php echo $situacoe; ?>">
    <label for="textfield3">Nivel de Acesso:</label>
    <input name="textfield3" type="text" id="textfield3" value="<?php echo $NivelDeAcesso; ?>">
    <label for="datetime">Date criação:</label>
    <input name="datetime" type="datetime" id="datetime" value="<?php echo $DataCriacao; ?>">
    <label for="datetime2">Date Modificação:</label>
    <input name="datetime2" type="datetime" id="datetime2" value="<?php echo $DataModificacao; ?>">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Atualizar">
  </p>
         </fieldset>
</form>
</body>
</html>


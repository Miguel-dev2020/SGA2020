<?php
	session_start();
	ini_set('display_errors',0);
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>

    <title>Sistema de Gestão de Alvará</title>
      <?php include("../libraries/header.php")?>

  </head>

  <body>

    <div id="login" class="bradius">

      <form method="POST" action="../views/validacao.php">
        <img src="../img/logotipo-SGA.png" alt="<?php echo $title;?>" title="<?php echo $title;?>" width="250" height="70" />
        <label for="Email" ><i class="fa fa-user" aria-hidden="true"></i> Email</label>
        <input type="email" name="email" id="Email" class="txt bradius" placeholder="nome-utilizador@me.gov.cv" required autofocus>
        <label for="Password" ><i class="fa fa-lock" aria-hidden="true"></i> Senha</label>
        <input type="password" name="senha" id="Password" class="txt bradius" placeholder="******************" required>
        <button class="btn bradius" type="submit">Entrar</button>
      </form>
	  <br>
	  <p class="text bradius" style='color:brown'>
			<?php if(isset($_SESSION['Erro_login'])){
				echo $_SESSION['Erro_login'];
				unset($_SESSION['Erro_login']);
			}?>
		</p>
		<p class="text bradius" style='color:darkgreen'>
			<?php 
			if(isset($_SESSION['Terminar_login'])){
				echo $_SESSION['Terminar_login'];
				unset($_SESSION['Terminar_login']);
			}
			?>
		</p>
    </div> 
        <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

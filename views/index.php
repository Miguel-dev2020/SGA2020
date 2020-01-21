<?php
	session_start();
	ini_set('display_errors',0);
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Sistema de Gestão de Alvará</title>
      <?php include("../libraries/header.php")?>

  </head>

  <body>
<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="../img/logotipo-SGA.png" class="w-75" alt="Logo"> </span><br/>
                        <span class="logo_title mt-5">Área de Login SGA</span>
     <h1>
	  <p class="alert" style='color:brown'>
			<?php if(isset($_SESSION['Erro_login'])){
				echo $_SESSION['Erro_login'];
				unset($_SESSION['Erro_login']);
			}?>
		</p>
		<p class="alert" style='color:darkgreen'>
			<?php 
			if(isset($_SESSION['Terminar_login'])){
				echo $_SESSION['Terminar_login'];
				unset($_SESSION['Terminar_login']);
			}
			?>
		</p></h1>

        </div>
        <div class="card-body">
            <form action="../views/validacao.php" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="nome-utilizador@me.gov.cv">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="senha" class="form-control" placeholder="******************">
                </div>

                <div class="form-group">
                    <input type="submit" name="btn" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>
</div>
      
    
        <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

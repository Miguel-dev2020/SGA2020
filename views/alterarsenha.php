<?php
	session_start();
	ini_set('display_errors',0);
?>
<!DOCTYPE html>
<html lang="pt-pt">
  <head>
      
      <title>SGA - Altera Senha</title>
      <?php include("../libraries/header.php")?>

  </head>

  <body>
      <div class="container">
              
           
          <div class="row">
                     

              <div id="loginbox" style="margin-top: 150px;" class="col-sm-5 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin mt-5">
        
        <div class="card-title text-center">
              
            <span> <img src="../img/logotipo-SGA.png" class="w-50" alt="Logo"> </span><br/>
            <span class="logo_title mt-5"><b>Informe Seu Email</b></span>

        </div>
        <div class="card-body">
            <form action="../views/enviarsenha.php" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="nome-utilizador@me.gov.cv">
                </div>


                <div class="form-group">
                    <input type="submit" name="btn" value="Alterar" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        
        </div>
       </div>
    </div>
             </div>
   </div>

        <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php require_once("../views/connect.php");?>

<!doctype html>
<html>

<head>
    
    
    <title>SGA - Gráficos de Alvará</title>
    <?php include("../libraries/header.php")?>

    
</head>

<body>
<div id="div-contener">
  <div id="div-header">
         <?php include("../libraries/body.php")?>
   </div>
  <div id="div-menu-vert">
         <?php include("../libraries/menu.php")?>
  </div>
  <div id="div-conteudo">
      <br>
      
          <fieldset class="custom-switch">
              <legend class="custom-switch"><h4><td>DASHBOARD - ESTATÍSTICA SOBRE ALVARÁ</h4></legend>
                <?php include("../dashboard/cards.php");
                include("../dashboard/grafico-linha.php");
                
                
                ?>
              
      
        </fieldset>
  
  </div>
    
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

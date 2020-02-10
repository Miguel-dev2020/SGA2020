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
              <legend class="custom-switch"><h4><td>DASHBOARD - DADOS ESTATÍSTICO SOBRE ALVARÁ</h4></legend>
                <?php include("../dashboard/cards.php")?>
              <div class="container-fluid" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Gráfico I</h3>
                                <?php include ("../dashboard/grafico-linha.php");?>
                            </div>
                            <div class="col-md-6">
                                
                                <h3>Gráfico II</h3>
                                <?php include ("../dashboard/grafico-pizza.php");?>
                            </div>

                        </div>
                  <div class="row"> <!--?php include ("../dashboard/table-charts.php");?--></div>
                  
              </div>
      
      </fieldset>
  
  </div>
    
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

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
    <!-- Start Cavas -> Desenhar elemento do gráfico usando JS -->
      <canvas class="line-chart"></canvas>
        
      <!-- Include chart JS -->
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
      
      <script>
      
      var ctx = document.getElementsByClassName("line-chart");
      
      // type, date e options
      var chartGraph = new Chart(ctx,{
          
        type: 'line',
        data:{
        labels: ["2019","2020","2021","2022"],
        datasets: [
            {
             labels: "EMISSÃO DE ALVARÁ - 2020",
             data: [10,15,5,10,25],
             borderWidth: 6,
             borderColor: 'rgba(77,166,253,0.85)',
             backgroundColor: 'transparent',
                           
        },
        {
             labels: "EMISSÃO DE ALVARÁ - 2021",
             data: [9,10,7,10,30],
             borderWidth: 6,
             borderColor: 'rgba(255,100,255,0.85)',
             backgroundColor: 'transparent',
         },
         ]
        },
        options: {
            title: {
                display: true,
                fontSize: 20,
                text: "RELATÓRIO DE ALVARÁ ANUAL",
            },
            labesls: {
                
                fontStyle: "bold",
            }
        }
      });
      
      
      </script>
  
  
  
  
  </div>
    
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

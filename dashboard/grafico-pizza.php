
    <!-- Start Cavas -> Desenhar elemento do gráfico usando JS -->
      <canvas class="line-chart"></canvas>
        
      <!-- Include chart JS -->
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
      
      <script>
      
      var ctx = document.getElementsByClassName("line-chart");
      
      // type, date e options
      var chartGraph = new Chart(ctx,{
         <?php 
          include("../views/connect.php");
          $sql="SELECT * FROM utilizadores";
          $buscar = mysqli_query($conn, $sql);
          
          while ($dados = mysqli_fetch_array($buscar)){
              
            $id= $dados['id']; 
            $id = $dados['id'];
            
            

          ?>
          
        type: 'doughnut',
        data:{
        labels: ["id","id"],
        datasets: [
            {
             labels: "EMISSÃO DE ALVARÁ - 2020",
             data: ['<?php echo $id ?>',<?php echo $id ?>],
             borderWidth: 6,
             borderColor: 'rgba(77,166,253,0.85)',
             backgroundColor: 'transparent',
                           
        },
        {
             labels: "EMISSÃO DE ALVARÁ - 2020",
             data: ['<?php echo $id ?>',<?php echo $id ?>],
             borderWidth: 6,
             borderColor: 'rgba(255,100,255,0.85)',
             backgroundColor: 'transparent',
         },
          ]
        },
        <?php } ?>
        options: {
            title: {
                //display: true,
                //fontSize: 20,
                //text: "RELATÓRIO DE ALVARÁ ANUAL",
            },
            labesls: {
                
                fontStyle: "bold",
            }
        }
      });
      
      
      </script>
  

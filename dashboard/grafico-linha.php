 <div id="curve_chart" style="width: 900px; height: 500px">   
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['utilizador', 'email', 'dt_criacao'],
          
          <?php 
          include("../views/connect.php");
          $sql="SELECT * FROM utilizadores";
          $buscar = mysqli_query($conn, $sql);
          
          while ($dados = mysqli_fetch_array($buscar)){
              
            $utilizador = $dados['utilizador']; 
            $email = $dados['email'];
            $dt_criacao = $dados['dt_criacao'];
              

          
          
          ?>
          
          
          
          ['<?php echo $utilizador?>',  <?php echo $email ?>, <?php echo $dt_criacao ?>],
<?php } ?>

        ]);

        var options = {
          title: 'ALVARÁ REGISTRADO'
          //curveType: 'function',
          //legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

    </div>

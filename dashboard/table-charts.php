<div id="table_div">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'utilizador');
        data.addColumn('number', 'id');
        
        data.addRows([
          <?php 
          include("../views/connect.php");
          $sql="SELECT * FROM utilizadores";
          $buscar = mysqli_query($conn, $sql);
          
          while ($dados = mysqli_fetch_array($buscar)){
              
            $utilizador = $dados['utilizador']; 
            $id = $dados['id'];
            

          
          ?>
          
          
          
          ['<?php echo $utilizador?>',  <?php echo $id ?>],
<?php } ?>

        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
  
    </div>


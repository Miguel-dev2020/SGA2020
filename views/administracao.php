<?php require_once("../views/connect.php"); ?>
<?php require_once '../controllers/processautilizador.php'; ?>
<?php 
if(isset($_POST['search']))
{
 $procurar = $_POST['procurar'];
 $query = "select * from utilizadores WHERE CONCAT(`id`, `utilizador`, `email`, `situacoe_id`, `niveis_acesso_id`, `dt_criacao`, `dt_modificacao`) LIKE '%".$procurar."%'";
 $search_result = filterTable($query);
}
else{
    $query = "select * from utilizadores";
    $search_result = filterTable($query);
}
    function filterTable($query){
        $connect = mysqli_connect("localhost", "root", "", "bd-sga")or trigger_error(mysql_error(),E_USER_ERROR);
        $filter_result = mysqli_query($connect, $query);
        return $filter_result;
    }
?>

<!doctype html>
<html>
<head>
    
    <title>SGA - Administração</title>
    <?php include("../libraries/header.php")?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></link>
    <script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#listar-utilizador').DataTable({			
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": "../controller/proc_pesq_utilizador.php",
					"type": "POST"
				}
			});
		} );
		</script>
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
      <br><br>
 
  <!-- formulario de pesquisa -->
      <div class="pesquisa">
         <fieldset id="fieldset">

   <form id="form-pesq" action="../views/administracao.php" method="POST">
                    <fieldset id="fieldset">
              <legend id="legend"><b>LISTAGENS DE UTILIZADORES</b></legend><br>
              <div class="novo"><p><a href="../views/utilizador.php"><i class="fa fa-user-plus" aria-hidden="true"> Novo Utilizador</i></a></p><br></div>
              
                    <input type="text" name="procurar" placeholder="Pesquisar . . ."> 
                    <input type="submit" name="search" value="Procurar">
              <br>
        <br></div>
        <!-- tabela com lista de dados -->
        <table class="table table-hover" >
            <tr>
              <td>#</td>
              <td>Utilizadores</td>
              <td>Email</td>
              <!--td>Situações</td>
              <td>Niveis de Acesso</td--> 
              <td>Data de Criação</td>
              <td>Data de Modificação</td>
              <td>Acções</td>
            </tr>
              <?php while($row = mysqli_fetch_array($search_result)):?>
              <tr>
                <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['utilizador'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <!--td><!--?php echo $row['situacoe_id'];?></td>
                  <td><!--?php echo $row['niveis_acesso_id'];?></td-->
                  <td><?php echo $row['dt_criacao'];?></td>
                  <td><?php echo $row['dt_modificacao'];?></td>
                  <td>
                      <a href="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     
                      <!--a href="../views/teste_updt.php?<!--?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a--> | <a href="../views/ut_del_utilizador.php?<?php echo $row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

            </tr>
              
              <?php endwhile; ?>
        </table>  
              
    </fieldset>
      </form>
          <!--/table-->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.couldflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
      </script>

    
  </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

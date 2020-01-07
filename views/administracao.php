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
<?php require_once("../views/connect.php"); ?>

<!doctype html>
<html>
<head>
    
    <title>SGA - Administração</title>
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
      <!-- formulario de pesquisa -->
      <div class="pesquisa">
      <form id="form-pesq" action="../views/administracao.php" method="POST">
          
          <fieldset><legend><b>LISTAGENS DE UTILIZADORES</b></legend><br>
            <input type="text" name="procurar" placeholder="Pesquisar . . ."> 
            <input type="submit" name="search" value="Procurar">
      
        <br><br>
        <!-- tabela com lista de dados -->
        <table id="table" bordercolor="#3e2c34">
            <tr>
              <td>Id</td>
              <td>Utilizadores</td>
              <td>Email</td>
              <td>Situações</td>
               <td>Niveis de Acesso</td> 
              <td>Data de Criação</td>
              <td>Data de Modificação</td>
              <td>Acções</td>
            </tr>
              <?php while($row = mysqli_fetch_array($search_result)):?>
              <tr>
                <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['utilizador'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['situacoe_id'];?></td>
                  <td><?php echo $row['niveis_acesso_id'];?></td>
                  <td><?php echo $row['dt_criacao'];?></td>
                  <td><?php echo $row['dt_modificacao'];?></td>
                  <td><a href="../views/teste_updt.php?<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="../views/ut_del_utilizador.php?<?php echo $row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

            </tr>
              
              <?php endwhile; ?>
        </table>  
              <div class="novo"><br><p><a href="../views/utilizador.php"><i class="fa fa-user-plus" aria-hidden="true"> Novo </i></a></p><br></div>
          </div>
    </fieldset></form>
      <!-- janea modal para edição de dados -->
      <div class="modal-fade" id="modalEdit" tabindex="-1" aria-labelledby="exempleModelLabel" aria-hidden="true">
          
      </div>
      <!-- jquery, popper.js, bootstrap.js -->
      <script src="jquery/jquery-3.3.1.min.js"></script>
      <script src="popper/popper.min.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      
      <!-- datatables.js -->
      <script type="text/javascript" src="datatables/datatables.min.js"></script>
      <script type="text/javascript" src="min.js"></script>
    
    
  </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

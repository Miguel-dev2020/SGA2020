<?php 
        require_once("../views/connect.php"); 
	
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qt_result_pag = 2;
		
		//calcular o inicio visualização
		$inicio = ($qt_result_pag * $pagina) - $qt_result_pag;
		
		$result_utilizador = "SELECT * FROM utilizadores LIMIT $inicio, $qt_result_pag";
		$resultado_utilizadores = mysqli_query($conn, $result_utilizador);
?>
<!doctype html>
<html>

<head>
 
    <title>SGA - Nivéis de Acessos</title>
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
   <?php while($row_utilizador = mysqli_fetch_assoc($resultado_utilizadores)){?>
              <tr>
                <td><?php echo $row_utilizador['id'];?></td>
                  <td><?php echo $row_utilizador['utilizador'];?></td>
                  <td><?php echo $row_utilizador['email'];?></td>
                  <td><?php echo $row_utilizador['situacoe_id'];?></td>
                  <td><?php echo $row_utilizador['niveis_acesso_id'];?></td>
                  <td><?php echo $row_utilizador['dt_criacao'];?></td>
                  <td><?php echo $row_utilizador['dt_modificacao'];?></td>
                  <td><a href="../views/ut_edit_utilizador.php?<?php echo $row_utilizador['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="../views/ut_del_utilizador.php?<?php echo $row_utilizador['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

            </tr>
              
              <?php } ?>
        </table>
 <?php    
    //Paginção - Somar a quantidade de usuários
		$result_pag = "SELECT COUNT(id) AS num_result FROM utilizadores";
		$resultado_pag = mysqli_query($conn, $result_pag);
		$row_pg = mysqli_fetch_assoc($resultado_pag);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$qt_pag = ceil($row_pg['num_result'] / $qt_result_pag);
		
		//Limitar os link antes depois
		$registro = 2;
		echo "<a href='../views/niveisdeacessos.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $registro; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='../views/niveisdeacessos.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_seg = $pagina + 1; $pag_seg <= $pagina + $registro; $pag_seg++){
			if($pag_seg <= $qt_pag){
				echo "<a href='../views/niveisdeacessos.php?pagina=$pag_seg'>$pag_seg</a> ";
			}
		}
		
		echo "<a href='../views/niveisdeacessos.php?pagina=$qt_pag'>Ultima</a>";
?>
  </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

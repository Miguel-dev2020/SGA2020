<?php 
        require_once("../views/connect.php"); 
	
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina');		
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
     
 
  </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

<?php 
        require_once("../views/connect.php");
        //require_once '../controllers/processautilizador.php';
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
    <title>SGA - Utilizadores</title>
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
      <!-- Formulário para Registro de Utilizadores -->
           <div id="div-form-utilizador">
               <br><fieldset><legend><b>REGISTRO DE UTILIZADORES</b></legend>
              <form action="processutilizador.php" method="POST"> 
                  <input type="hidden" name="id" value="<?php echo $row_utilizador['id'];?>">
          <div class="utilizador esquerda" id="">
                    <label for="utilizador">Nome de Utilizador:</label>
              <br>
                    <input name="utilizador" type="text" size="50" value="<?php echo $row_utilizador['utilizador'];?>" placeholder="Utilizador">
                 </div>
            <div class="esquerda" id="">
                    <label for="email">E-mail:</label>
              <br>
              <input name="email" type="email" size="45" value="<?php echo $row_utilizador['email'];?>" placeholder="exemplo@me.gov.cv">
                 </div>

            <div class="esquerda" id="">
                    <label for="senha">Senha:</label>
              <br>
                    <input name="senha" type="password" size="25" value="<?php echo $row_utilizador['senha'];?>" placeholder="***********">
                  </div>       
            <div class="esquerda" id="">
                    <label for="situacoe_id">Situações:</label><br>
                    <select name="situacoe_id" id="">
                       <option value="Selecionar"> -Seleciona uma situação-</option>
                        <option value="Selecionar"> 1 </option>
                        <option value="Selecionar"> 2 </option>
                    </select>
                 </div>
                <div class="direita" id="">
                    <label for="niveis_acesso_id">Níveis de Acessos:</label><br>
                    <select name="niveis_acesso_id" id="">
                       <option value="Selecionar"> -Seleciona um nivel-</option>
                        <option value="Selecionar"> 1 </option>
                        <option value="Selecionar"> 2 </option>
                        <option value="Selecionar"> 3 </option>
                    </select>
                 </div>
                <div class="data direita" id="">
                    <label for="dt_criacao" >Data de Criação:</label><br>
                    <input name="dt_criacao" type="datetime" size="25" value="<?php echo $row_utilizador['dt_criacao'];?>" placeholder="AAAA-MM-DD HH:MN:SS">
                 </div>
                <div class="data" id="">
                    <label for="dt_modificacao">Data de Modificação:</label><br>
                    <input name="dt_modificacao" type="datetime" size="25" value="<?php echo $row_utilizador['dt_modificacao'];?>" placeholder="AAAA-MM-DD HH:MN:SS">
                 </div><br>
                  </fieldset>
                 <br>
                 <button type="submit" calss="btn btn-info" name="guardar">Guardar</button>
                 <button type="reset" calss="btn btn-info" name="guardar">Limpar Campos</button>
                 <!--input type="submit" value="Registrar" class="botao"-->
                 <!--input type="reset" value="Limpar Campos" class="botao"-->
              </form>
           </div>
           <!-- fim de formulário de registro -->
      <br>
      <div id="div-regist-ut">
<!-- apresentação de lista de dados -->
          <fieldset><legend><b>LISTAGENS DE UTILIZADORES</b></legend><br>
       <table id="table table-hover" >
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
                  <td><a href="../views/utilizador.php?<?php echo $row_utilizador['id'];?>" class="">upd</a>|<a href="../views/processautilizador.php?<?php echo $row_utilizador['id'];?>" class="">del</a></td>

            </tr>
              
              <?php } ?>
        </table>
              <div id="div-num-pagina">
                 <?php    
                //Paginção - com soma de quantidade de utilizadores
                $result_pag = "SELECT COUNT(id) AS num_result FROM utilizadores";
                $resultado_pag = mysqli_query($conn, $result_pag);
                $row_pg = mysqli_fetch_assoc($resultado_pag);

                //Quantidade de pagina 
                $qt_pag = ceil($row_pg['num_result'] / $qt_result_pag);

                //Limitação dos links antes e depois
                $registro = 2;
                echo "<a href='../views/utilizador.php?pagina=1'>Primeira</a> ";

                for($pag_ant = $pagina - $registro; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        echo "<a href='../views/utilizador.php?pagina=$pag_ant'>$pag_ant</a> ";
                    }
                }

                echo "$pagina ";

                for($pag_seg = $pagina + 1; $pag_seg <= $pagina + $registro; $pag_seg++){
                    if($pag_seg <= $qt_pag){
                        echo "<a href='../views/utilizador.php?pagina=$pag_seg'>$pag_seg</a> ";
                    }
                }

                echo "<a href='../views/utilizador.php?pagina=$qt_pag'>Ultima</a>";
                        ?>
              </div>
      </div>
    
  </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>
<?php //require_once("../views/connect.php");?>
<?php require_once '../controllers/processautilizador.php'; ?>
<!doctype html>
<html>

<head>
    <title>SGA - Administração de Utilizadores</title>
    <?php include("../libraries/header.php")?>

</head>

<body>

    
<div id="div-contener">
     <?php 
        //Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qt_result_pag = 3;
		
		//calcular o inicio visualização
		$inicio = ($qt_result_pag * $pagina) - $qt_result_pag;
                
                
        $mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM utilizadores LIMIT $inicio, $qt_result_pag")or die ($mysqli->error);
        //$result = $mysqli->query("SELECT * FROM utilizadores") or die ($mysqli->error);
        //pre_r($result);
        //pre_r($result ->fetch_assoc());
        ?>
  <div id="div-header">
         <?php include("../libraries/body.php")?>
   </div>
  <div id="div-menu-vert">
         <?php include("../libraries/menu.php")?>
  </div>
  <div id="div-conteudo">
      <br><?php 
        //Mensagem de Alerta
        
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?> style='color:brown'">
            
            <?php 
             echo $_SESSION['message'];
             unset($_SESSION['message']); 
            ?>
        </div>
        <?php endif ?>
                       
              <div id="div-form-utilizador">                  
                  <br>
                  <fieldset><legend><b>LISTA DE UTILIZADORES</b></legend><br>
            <table id="table">
                <thead>
                    <tr>
                        <th>Utilizador</th>
                        <th>Email</th>
                        <th>Data Criação</th>
                        <th>Situação</th>
                        <th>Nivel de Acesso</th>
                        <th>Data Modificação</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <?php 
                        while ($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['utilizador']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['dt_criacao']; ?></td>
                    <td><?php echo $row['situacoe_id']; ?></td>
                    <td><?php echo $row['niveis_acesso_id']; ?></td>
                    <td><?php echo $row['dt_modificacao']; ?></td>
                    <td>
                        <a href="../views/utilizador.php?edit=<?php echo $row['id']; ?>"
                           class="btn-ed">Edit</a> |
                           <a href="../controllers/processautilizador.php?delete=<?php echo $row['id']; ?>"
                           class="btn-del">Del</a>
                    </td>
                        
                    
                </tr>
                <?php endwhile; ?>
            </table>
                  </fieldset><br>
        </div>
        
                <?php
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                ?>
            <div id="div-num-pagina">
                <?php    
                //Paginção - com soma de quantidade de utilizadores
                $result = "SELECT COUNT(id) AS num_result FROM utilizadores";
                $resultado_pag = mysqli_query($mysqli, $result);
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
      <br> 
        <div id="div-form-utilizador">
       <fieldset><legend><b>REGISTRO DE UTILIZADORES</b></legend><br>     
        <div class="col-sm-6">    
            <form action="../controllers/processautilizador.php" method="POST">
                    <div class="uilizador esquerda">     

                             <div class=""> 
                                 <input type="hidden" name="id" value="<?php echo $id; ?>"> </div>
                        <br>
                             <div class=""><label>Utilizador:</label>
                                 <input type="text" name="utilizador" class="form-control" value="<?php echo $utilizador; ?>" placeholder="Nome de Utilizador"></div>
                        <br>
                             <div class=""><label>Email:</label>
                                 <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"placeholder="email@exemplo.com"></div>
                        <br>
                             <div class=""><label>Senha:</label>
                                 <input type="password" name="senha" class="form-control" value="<?php echo $senha; ?>" placeholder="********"></div>

                     </div>   
                
                
                    <div class="direita">
                            <div class=""><label>Situação:</label>
                                <input type="text" name="situacoe_id" class="form-control" value="<?php echo $situacoe_id; ?>" placeholder="situação"></div>
                        <br>
                            <div class="">
                                <label>Niveil de Acesso:</label>
                                <input type="text" name="niveis_acesso_id" class="form-control" value="<?php echo $niveis_acesso_id; ?>" placeholder="Nivel de Acesso"></div>
                                <br>
                    </div>
               
                    <div class="direita">

                            <div class=""> <label>Data Criação:</label>
                                <input type="datetime" name="dt_criacao" class="form-control" value="<?php echo $dt_criacao; ?>" placeholder="Data de Criação"></div>
                                <br>
                           <div class="">
                                <label>Data Modificação:</label>
                                <input type="datetime" name="dt_modificacao" class="form-control" value="<?php echo $dt_modificacao; ?>" placeholder="Data de Modificação"></div> 
                    </div>
                
                         
                         <br>
                
                    <div class="esquerda">
                        
                          <?php 
                          //alterar o botão para atualizar
                          if ($update == true):

                          ?>
                        <br>
                       <button type="submit" class="btn-sav" name="update">Atualizar</button>
                       
                       <?php else: ?><br>
                       <button type="submit" class="btn-sav" name="guardar">Guardar</button>
                       <button type="reset" class="btn-sav" name="limpar">Limpar</button>
                       
                       <?php endif;?>

                       </div>                          
        
            </form>
            
       </fieldset>
        </div>
        </div>  

    <footer>
        <?php include("../libraries/footer.php") ?>
   
    </footer>

</div>

</body>
</html>
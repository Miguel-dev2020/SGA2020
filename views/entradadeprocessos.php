<?php require_once("../views/connect.php");?>
<?php require_once '../controllers/processaprocesso.php';?>
 
<!doctype html>
<html>

<head>
 
    <title>SGA - Entrada de Alvará</title>
        
    <?php include("../libraries/header.php")?>
    
               
        <?php 
        //Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina');		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qt_result_pag = 3;
		
		//calcular o inicio visualização
		$inicio = ($qt_result_pag * $pagina) - $qt_result_pag;
                
                
                //$mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM correspondencia order by Dt_Correspondencia DESC LIMIT $inicio, $qt_result_pag")or die ($mysqli->error);
                //$result = $mysqli->query("SELECT * FROM utilizadores") or die ($mysqli->error);
                //pre_r($result);
                //pre_r($result ->fetch_assoc());
                ?>
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
    <br>

        <div class="container">
            
        <?php 
        //Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina');		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qt_result_pag = 3;
		
		//calcular o inicio visualização
		$inicio = ($qt_result_pag * $pagina) - $qt_result_pag;
                
                
        //$mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM correspondencia order by Dt_correspondencia DESC LIMIT $inicio, $qt_result_pag")or die ($mysqli->error);
        //$result = $mysqli->query("SELECT * FROM utilizadores") or die ($mysqli->error);
        //pre_r($result);
        //pre_r($result ->fetch_assoc());
        ?>
        <div class="contener">
            <div class="row justify-content-lg-center"><h4>Alvará Registrado<hr></h4></div>
                                <?php 
                                //Menssagem de Alerta com ação sobre registro 
                                if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
                                    <?php 
                                     echo $_SESSION['message'];
                                     unset($_SESSION['message']); 
                                    ?>

                                </div>
                                <?php endif ?>
         
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        
                        <th>Estabelecimento</th>
                        <th>Nº Nota</th>
                        <th>Data Correspondencia</th>
                        <th>Nº Entrada</th>
                        <th>Data Entrada</th>
                        <th>Descrição</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <?php 
                        while ($row = $result->fetch_assoc()):?>
                <tr>
                    
                    <td><?php echo $row['Nome_Estabelecimento']; ?></td>
                    <td><?php echo $row['Num_Nota']; ?></td>
                    <td><?php echo $row['Dt_Correspondencia']; ?></td>
                    <td><?php echo $row['Num_Entrada']; ?></td>
                    <td><?php echo $row['Dt_Entrada']; ?></td>
                    <td><?php echo $row['Descricao']; ?></td>
                    <td>
                        <a href="../views/entradadeprocessos.php?edit=<?php echo $row['id']; ?>" class="btn btn-outline-warning">Editar</a>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalEliminar<?php echo $row['id']; ?>">Eliminar</button>
                        
                    </td>
                       
                    
                </tr>
                <?php endwhile; ?>
            </table>
            
        </div>
<!-- Janela Modal para confirmar eliminação de registro-->
            <div class="modal fade" id="ModalEliminar<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">ELIMINAR REGISTRO<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja eliminar o registro selecionado?</div><div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">NÃO</button>
                                    <a href="../controllers/apagarprocessaprocesso.php?id=<?php echo $row['id']; ?>" class="btn btn-danger text-white" id="dataComfirmOK">SIM</a></div>
                    </div>
                </div>
            </div>

                <?php
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                ?>
            <div class="row justify-content-center">
                <h3>
<?php    
                //Paginção - com soma de quantidade de utilizadores
                $result = "SELECT COUNT(id) AS num_result FROM correspondencia";
                $resultado_pag = mysqli_query($mysqli, $result);
                $row_pg = mysqli_fetch_assoc($resultado_pag);

                //Quantidade de pagina 
                $qt_pag = ceil($row_pg['num_result'] / $qt_result_pag);

                //Limitação dos links antes e depois
                $registro = 2;
                echo "<a href='../views/entradadeprocessos.php?pagina=1'>Primeira</a> ";

                for($pag_ant = $pagina - $registro; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        echo "<a href='../views/entradadeprocessos.php?pagina=$pag_ant'>$pag_ant</a> ";
                    }
                }

                echo "$pagina ";

                for($pag_seg = $pagina + 1; $pag_seg <= $pagina + $registro; $pag_seg++){
                    if($pag_seg <= $qt_pag){
                        echo "<a href='../views/entradadeprocessos.php?pagina=$pag_seg'>$pag_seg</a> ";
                    }
                }

                echo "<a href='../views/entradadeprocessos.php?pagina=$qt_pag'>Ultima</a>";
                        ?>
                </h3></div>
        
        
        <div class="row justify-content-center">
            <h4>Registrar & Atualizar Registro<hr></h4>
        <div class="col-md-offset-3">    
            <form action="../controllers/processaprocesso.php" method="POST">
                    <div class="row">     

                             <div class="col-sm-6"> 
                                 <input type="hidden" name="id" value="<?php echo $id; ?>"> </div>

                             <div class="col-sm-12"><label>Estab:</label>
                                 <input type="text" name="Nome_Estabelecimento" class="form-control" value="<?php echo $Nome_Estabelecimento; ?>" placeholder="Nome de Utilizador"></div>

                             <div class="col-sm-6"><label>Nº Nota:</label>
                                 <input type="text" name="Num_Nota" class="form-control" value="<?php echo $Num_Nota; ?>"placeholder="Nº Nota"></div>

                             <div class="col-sm-6"><label>Dt Cores:</label>
                                 <input type="date" name="Dt_Correspondencia" class="form-control" value="<?php echo $Dt_Correspondencia; ?>" placeholder="Data Correspondencia"></div>

                     </div>   
                
                
                    <div class="row">
                            <div class="col-sm-6"><label>Nº Ent:</label>
                                <input type="text" name="Num_Entrada" class="form-control" value="<?php echo $Num_Entrada; ?>" placeholder="número entrada"></div>

                            <div class="col-sm-6">
                                <label>Dt Ent:</label>
                                <input type="date" name="Dt_Entrada" class="form-control" value="<?php echo $Dt_Entrada; ?>" placeholder="data entrada"></div>
                    </div>
                 
                    <div class="row">

                            <div class="col-sm-6"> <label>Desc:</label>
                                <input name="Descricao" class="form-control" value="<?php echo $Descricao; ?>" placeholder="Descrição"></div>

                            </div>
                
                         <br>
                
                    <div class="form-group">

                          <?php 
                          //alterar o botão para atualizar
                          if ($update == true):

                          ?>
                       <button type="submit" calss="btn btn-outline-primary" name="update">Atualizar</button>
                       <?php else: ?>
                       <button type="submit" calss="btn btn-outline-dark" name="guardar">Guardar</button>
                       <button type="reset" calss="btn btn-outline-primary" name="limpar">Limpar</button>
                       <?php endif;?>

                       </div>                          
        
            </form>
        </div>
        </div>            
            
        </div>

     </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>
    
</body>
</html>

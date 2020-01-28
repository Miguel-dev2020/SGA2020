<?php require_once("../views/connect.php");?>
<?php require_once '../controllers/processaprocesso.php'; ?>
<!doctype html>
<html>

<head>
 
    <title>SGA - Entrada de Alvará</title>
    <?php include("../libraries/header.php")?>

        
        <?php 
        //Menssagem de Alerta
        if (isset($_SESSION['message'])): ?>
        <div class="alert  alert-<?=$_SESSION['msg_type']?>" role="alert">
            <?php 
             echo $_SESSION['message'];
             unset($_SESSION['message']); 
            ?>
        </div>
        <?php endif ?>
        <div class="container">
        <?php 
        //Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina');		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qt_result_pag = 3;
		
		//calcular o inicio visualização
		$inicio = ($qt_result_pag * $pagina) - $qt_result_pag;
                
                
                $mysqli = new mysqli('localhost', 'root', '', 'bd-sga') or die (mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM alvara order by Num_Alvara DESC LIMIT $inicio, $qt_result_pag")or die ($mysqli->error);
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
            <fieldset class="col-lg-12">
                <legend class="col-form-label pt-0">LISTA DE ALVARÁ</legend>
            <table class="collection table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Alvara Nº</th>
                        <th>Data Emissão</th>
                        <th>Data Validade</th>
                        <th>Descrição</th>
                        <th>Tipo Alvará</th>
                        <th>Estabelecimento</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <?php 
                        while ($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['Num_Alvara']; ?></td>
                    <td><?php echo $row['Dt_Emissao']; ?></td>
                    <td><?php echo $row['Dt_Validade']; ?></td>
                    <td><?php echo $row['Descricao']; ?></td>
                    <td><?php echo $row['Tp_Alvara_id']; ?></td>
                    <td><?php echo $row['Estabelecimento_id']; ?></td>
                    <td>
                        <a href="../views/entradadeprocessos.php?edit=<?php echo $row['Num_Alvara']; ?>"
                           class="btn-xs btn-warning">Editar</a>
                           <a href="../controllers/processaprocesso.php?delete=<?php echo $row['id']; ?>"
                           class="btn-xs btn-danger">Eliminar</a>
                    </td>
                        
                    
                </tr>
                <?php endwhile; ?>
            </table>
                </fieldset>
    <?php
                function pre_r($array){
                    echo '<pre>';
                    print_r($array);
                    echo '<pre>';
                }
                ?>
     <div id="div-num-pagina">
 <?php  
 
    //Paginção - Somar a quantidade de usuários
		$result_pag = "SELECT COUNT(Num_Alvara) AS num_result FROM alvara";
		$resultado_pag = mysqli_query($conn, $result_pag);
		$row_pg = mysqli_fetch_assoc($resultado_pag);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$qt_pag = ceil($row_pg['num_result'] / $qt_result_pag);
		
		//Limitar os link antes depois
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
				echo "<a href='.../views/entradadeprocessos.php?pagina=$pag_seg'>$pag_seg</a> ";
			}
		}
		
		echo "<a href='../views/entradadeprocessos.php?pagina=$qt_pag'>Ultima</a>";
?>
  </div><br>
            <div class="row justify-content-center">
            <fieldset id="fieldset">
                <legend class="col-form-label pt-0">REGISTRAR/ATUALIZAR ALVARÁ</legend>  
                <div class="col-md-offset-3">    
                    <form action="../controllers/processaprocesso.php" method="POST">
                        <div class="col-sm-6"> 
                                     <input type="hidden" name="Num_Alvara" value="<?php echo $Num_Alvara; ?>"> </div> 
                        <div class="row">     

                             <div class="col-sm-6"><label>Data de Emissão:</label>
                                 <input type="date" name="Dt_Emissao" class="form-control" value="<?php echo $Dt_Emissao; ?>"placeholder="Data de Emissão"></div>
 
                             <div class="col-sm-6"><label>Data Validade:</label>
                                 <input type="date" name="Dt_Validade" class="form-control" value="<?php echo $Dt_Validade; ?>" placeholder="Data de Validade"></div>
                        </div> 
                      
                
                
                    <div class="row">
                            <div class="col-sm-12"><label>Descrição:</label>
                                <textarea class="form-control" row="50" name="Descricao" value="<?php echo $Descricao; ?>" placeholder="Descrição"></textarea></div>

                            
                    </div>
                 
                    <div class="row">
                    <div class="col-sm-12">
                                <label>Tipo de Alvará:</label>
                                <input type="text" name="Tp_Alvara_id" class="form-control" value="<?php echo $Tp_Alvara_id; ?>" placeholder="Tipo de Alvara">
                                <!--select name="niveis_acesso_id" id="niveis_acesso_id" class="form-control">
                                <option value=""> Escolher Acesso ...</option>
                                        </?php 
                                                $result_nivel ="Select acesso from niveis_acessos INNER JOIN utilizadores on utilizadores.niveis_acesso_id=niveis_acessos.id GROUP BY acesso";
                                                $resultado_nivel = mysqli_query($mysqli, $result_nivel);
                                                While($row_nivel =mysqli_fetch_assoc($resultado_nivel)){
                                                    echo '<option value="'.$row_nivel['utilizadores.niveis_acesso_id'].'">'.$row_nivel['acesso'].'</option>';

                                                }
                                        ?>

                                </select-->
                            </div>
                            <div class="col-sm-12"> <label>Estabelecimento:</label>
                                <input type="text" name="dt_criacao" class="form-control" value="<?php echo $Estabelecimento_id; ?>" placeholder="Estabelecimento"></div>

                    </div>
                
                         <br>
                
                    <div class="form-group">

                          <?php 
                          //alterar o botão para atualizar
                          if ($update == true):

                          ?>
                       <button type="submit" calss="btn-danger" name="update">Alterar</button>
                       <?php else: ?>
                       <button type="submit" calss="btn-success" name="guardar">Guardar</button>
                       <button type="reset" calss="btn-primary" name="limpar">Limpar Campos</button>
                       <?php endif;?>

                       </div>                          
        
            </form>
            
        </div>
            </fieldset>
        </div>
     </div>
    <footer>
        <?php include("../libraries/footer.php") ?>
        
    </footer>

</div>

</body>
</html>

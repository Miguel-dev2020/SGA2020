<?php require_once("../views/connect.php");
                        //Receber o número da página
			$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 5;
			
			//calcular o inicio da visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                        $result_utilizadores = "SELECT * FROM utilizadores LIMIT $inicio, $qnt_result_pg";
                        $resultado_utilizadores = mysqli_query($conn, $result_utilizadores);
?>
<?php require_once '../controllers/processautilizador.php'; ?>

<!doctype html>
<html>

<head>
    <title>SGA - Administração de Utilizadores</title>
    <!-- chamada do cabeçalho-->
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
      <br>
	<div class="container theme-showcase" role="main">
			<div class="page-header">
                            <h2> 
                                <i class="fas fa-user-cog">UTILIZADORES DO SISTEMA</i>
                            </h2>
                        </div>
                         <div><h1><p class="alert-danger">
                            <?php if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
                                }?></p></div>
			<div class="pull-right">
				<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModalcad">Criar Novo</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-success">
							<h4 class="modal-title" id="myModalLabel">#Registrar Utilizador</h4>
                                                        <button type="button" class="close btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							
						</div>
						<div class="modal-body">
                                                                        <span id="msg"></span>
                                                                        <span id="conteudo"></span><br><br>
                                                    <form method="POST" action="../controllers/processa-registrar.php" enctype="multipart/form-data" id="insert_form_utilizador">
                                                        <span id="message"></span>
								<div class="form-group">
									<label for="recipient-utilizador" class="control-label">Utilizador:</label>
									<input name="utilizador" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-email" class="control-label">Email:</label>
									<input name="email" type="email" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-senha" class="control-label">Senha:</label>
									<input name="senha" type="password" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-situacoe" class="control-label">Situação:</label>
									<input name="situacoe_id" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-niveisacesso" class="control-label">Nivel de Acesso:</label>
									<!--input name="niveis_acesso_id" type="text" class="form-control"-->
                                                                        <select name="niveis_acesso_id" id="recipient-nivelacesso" class="form-control">
                                                                        <option value="">--Escolher--</option>
                                                                            <?php 
                                                                                $result_nivel ="Select acesso from niveis_acessos INNER JOIN utilizadores on utilizadores.niveis_acesso_id=niveis_acessos.id GROUP BY acesso";
                                                                                $resultado_nivel = mysqli_query($conn, $result_nivel);
                                                                                While($row_nivel =mysqli_fetch_assoc($resultado_nivel)){
                                                                                    echo '<option value="'.$row_nivel['utilizadores.niveis_acesso_id'].'">'.$row_nivel['acesso'].'</option>';

                                                                                }
                                                                            ?>
                                                                        </select>
								</div>
								
								<div class="form-group">
									<label for="recipient-data" class="control-label">Data de criação:</label>
									<input name="dt_criacao" type="datetime" class="form-control">
								</div>
								<div class="form-group">
									<label for="recipient-data" class="control-label">Data de Modificaçao:</label>
									<input name="dt_modificacao" type="datetime" class="form-control">
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-outline-success">Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
			
			<div class="row">
				<div class="col-md-10">
					<table class="table table-sm table-hover">
						<thead>
							<tr>
								<!--th>#Nº</th-->
								<th>Utilizador</th>
								<th>Email</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_utilizadores = mysqli_fetch_assoc($resultado_utilizadores)){ ?>
								<tr>
									<!--td></?php echo $rows_utilizadores['id']; ?></td-->
									<td><?php echo $rows_utilizadores['utilizador']; ?></td>
									<td><?php echo $rows_utilizadores['email']; ?></td>
									<td>
										<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_utilizadores['id']; ?>">Ver</button>
										
										<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal" 
										data-whatever="<?php echo $rows_utilizadores['id']; ?>" 
										data-whateverutilizador="<?php echo $rows_utilizadores['utilizador']; ?>"  
										data-whateveremail="<?php echo $rows_utilizadores['email']; ?>"
										data-whateversenha="<?php echo $rows_utilizadores['senha']; ?>"
										data-whateversituacoe="<?php echo $rows_utilizadores['situacoe_id']; ?>"
										data-whatevernivelacesso="<?php echo $rows_utilizadores['niveis_acesso_id']; ?>"
										data-whateverdatacriacao="<?php echo $rows_utilizadores['dt_criacao']; ?>"
										data-whateverdatamodificacao="<?php echo $rows_utilizadores['dt_modificacao']; ?>"
										>Editar</button>
										
                                                                                <a href="../controllers/processa-eliminar.php?id=<?php echo $rows_utilizadores['id']; ?>"><button type="button" class="btn btn-outline-danger">Eliminar</button></a>
									</td>
								</tr>
                                                                	
                                                                
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_utilizadores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header bg-primary">
                                                                                                <span id="msg"></span>
												
                                                                                                
												<h4 class="modal-title text-center" id="myModalLabel">#<?php echo $rows_utilizadores['utilizador']; ?></h4>
                                                                                                <button type="button" class="close btn btn-outline-danger" data-dismiss="modal" ariabg-danger-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
                                                                                            <p><b>Id:</b> <?php echo $rows_utilizadores['id']; ?></p>
                                                                                            <p><b>Utilizador:</b> <?php echo $rows_utilizadores['utilizador']; ?></p>
                                                                                            <p><b>Email:</b> <?php echo $rows_utilizadores['email']; ?></p>
                                                                                            <p><b>Senha:</b> <?php echo $rows_utilizadores['senha']; ?><p>
                                                                                            <p><b>Situação:</b> <?php echo $rows_utilizadores['situacoe_id']; ?><p>
                                                                                            <p><b>Nível de Acesso:</b> <?php echo $rows_utilizadores['niveis_acesso_id']; ?><p>
                                                                                            <p><b>Data Criação:</b> <?php echo $rows_utilizadores['dt_criacao']; ?><p>
                                                                                            <p><b>Data Modificação:</b> <?php echo $rows_utilizadores['dt_modificacao']; ?><p>
												
											</div>
                                                                                    <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fechar</button>
					</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
							<?php } ?>
                                                                
						</tbody>
                                        </table>
                                    <div class="row justify-content-center">
                                        <h3>
                                    <?php
                                                                        //Paginção - Somar a quantidade de utilizador por paginas
                                                                        $result_pg = "SELECT COUNT(id) AS num_result FROM utilizadores";
                                                                        $resultado_pg = mysqli_query($conn, $result_pg);
                                                                        $row_pg = mysqli_fetch_assoc($resultado_pg);
                                                                        //echo $row_pg['num_result'];
                                                                        //Quantidade de pagina 
                                                                        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                                                                        //Limitar os link antes depois
                                                                        $max_links = 2;
                                                                        echo "<a href='../views/utilizador.php?pagina=1'>Primeira</a> ";

                                                                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                                                                                if($pag_ant >= 1){
                                                                                        echo "<a href='../views/utilizador.php?pagina=$pag_ant'>$pag_ant</a> ";
                                                                                }
                                                                        }

                                                                        echo "$pagina ";

                                                                        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                                                                                if($pag_dep <= $quantidade_pg){
                                                                                        echo "<a href='../views/utilizador.php?pagina=$pag_dep'>$pag_dep</a> ";
                                                                                }
                                                                        }

                                                                        echo "<a href='../views/utilizador.php?pagina=$quantidade_pg'>Ultima</a>";

                                                                ?>
                                        </h3></div>
				</div>
			</div>		
		</div>

		
		
	
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h4 class="modal-title" id="exampleModalLabel">Utilizadores</h4>
                                                <button type="button" class="close btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						
					</div>
					<div class="modal-body">
                                            <span id="msg-error"></span>
                                            <form method="POST" action="../controllers/processa-utilizadores.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-utilizador" class="control-label">Utilizador:</label>
								<input name="utilizador" type="text" class="form-control" id="recipient-utilizador">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="email" class="form-control" id="recipient-email">
							</div>
							<div class="form-group">
								<label for="recipient-senha" class="control-label">Senha:</label>
								<input name="senha" type="password" class="form-control" id="recipient-senha">
							</div>
							<div class="form-group">
									<label for="recipient-situacoe" class="control-label">Situação:</label>
									<input name="situacoe_id" type="text" class="form-control" id="recipient-situacoe">
								</div>
							
							<div class="form-group">
                                                            
									<label for="recipient-nivelacesso" class="control-label">Nível de Acesso:</label>
									<input name="niveis_acesso_id" type="text" class="form-control" id="recipient-nivelacesso">
                                                                        
                                                                        <!--select name="niveis_acesso_id" id="recipient-nivelacesso" class="form-control">
                                                                        <option value="">--Escolher--</option>
                                                                            </?php 
                                                                                $result_nivel ="Select acesso from niveis_acessos INNER JOIN utilizadores on utilizadores.niveis_acesso_id=niveis_acessos.id GROUP BY acesso";
                                                                                $resultado_nivel = mysqli_query($conn, $result_nivel);
                                                                                While($row_nivel =mysqli_fetch_assoc($resultado_nivel)){
                                                                                    echo '<option value="'.$row_nivel['utilizadores.niveis_acesso_id'].'">'.$row_nivel['acesso'].'</option>';

                                                                                }
                                                                            ?>
                                                                        </select-->
                                                        
                                                        
                                                        
                                                        </div>
							
							
							<div class="form-group">
								<label for="recipient-datacriacao" class="control-label">Data de Criaçao:</label>
								<input name="dt_criacao" type="datetime" class="form-control" id="recipient-datacriacao">
							</div>
							<div class="form-group">
								<label for="recipient-datamodificacao" class="control-label">Data de Modificação:</label>
								<input name="dt_modificacao" type="datetime" class="form-control" id="recipient-datamodificacao">
							</div>
							<input name="id" type="hidden" id="id">
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-outline-danger">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>
		
		
		
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientutilizador = button.data('whateverutilizador')
				var recipientemail = button.data('whateveremail')
				var recipientsenha = button.data('whateversenha')
				var recipientsituacoe = button.data('whateversituacoe')
				var recipientnivelacesso = button.data('whatevernivelacesso')
				var recipientdatacriacao = button.data('whateverdatacriacao')
				var recipientdatamodificaca = button.data('whateverdatamodificacao')
				
				
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('#Nº: ' + recipient)
				modal.find('#id').val(recipient)
                                modal.find('#recipient-utilizador').val(recipientutilizador)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-senha').val(recipientsenha)
				modal.find('#recipient-situacoe').val(recipientsituacoe)
				modal.find('#recipient-nivelacesso').val(recipientnivelacesso)
				modal.find('#recipient-datacriacao').val(recipientdatacriacao)
				modal.find('#recipient-datamodificacao').val(recipientdatamodificaca)
				
			})
                        
		</script>
      
      <!-- PAGINAÇÃO-->
        
</div>    
    <footer>
        <?php include("../libraries/footer.php") ?>
   
    </footer>
</div>

</body>
</html>
<?php require_once("../views/connect.php");

$result_utilizadores = "SELECT * FROM utilizadores";
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
                            
                               <h1> <i class="fas fa-user-cog"> UTILIZADORES DO SISTEMA</i></h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Criar Novo</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-success">
							<h4 class="modal-title" id="myModalLabel">Registrar Utilizador</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							
						</div>
						<div class="modal-body">
                                                    <form method="POST" action="../controllers/processa-registrar.php" enctype="multipart/form-data">
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
									<input name="niveis_acesso_id" type="text" class="form-control">
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
									<button type="submit" class="btn-success">Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
			
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#Nº</th>
								<th>Utilizador</th>
								<th>Email</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_utilizadores = mysqli_fetch_assoc($resultado_utilizadores)){ ?>
								<tr>
									<td><?php echo $rows_utilizadores['id']; ?></td>
									<td><?php echo $rows_utilizadores['utilizador']; ?></td>
									<td><?php echo $rows_utilizadores['email']; ?></td>
									<td>
										<button type="button" class="btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_utilizadores['id']; ?>">Ver</button>
										
										<button type="button" class="btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" 
										data-whatever="<?php echo $rows_utilizadores['id']; ?>" 
										data-whateverutilizador="<?php echo $rows_utilizadores['utilizador']; ?>"  
										data-whateveremail="<?php echo $rows_utilizadores['email']; ?>"
										data-whateversenha="<?php echo $rows_utilizadores['senha']; ?>"
										data-whateversituacoe="<?php echo $rows_utilizadores['situacoe_id']; ?>"
										data-whatevernivelacesso="<?php echo $rows_utilizadores['niveis_acesso_id']; ?>"
										data-whateverdatacriacao="<?php echo $rows_utilizadores['dt_criacao']; ?>"
										data-whateverdatamodificacao="<?php echo $rows_utilizadores['dt_modificacao']; ?>"
										>Editar</button>
										
                                                                                <a href="../controllers/processa-eliminar.php?id=<?php echo $rows_utilizadores['id']; ?>"><button type="button" class="btn-xs btn-danger">Eliminar</button></a>
									</td>
								</tr>
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_utilizadores['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header bg-primary">
												
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_utilizadores['utilizador']; ?></h4>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		
		
	
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h4 class="modal-title" id="exampleModalLabel">Utilizadores</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						
					</div>
					<div class="modal-body">
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
								<button type="button" class="btn-primary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn-danger">Alterar</button>
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
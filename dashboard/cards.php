<div class="container-fluid">
          
          <div class="row">
              <div class="col-md-4">
                  <div class="card border-danger mb-3" style="max-width: 18rem;">
                    
                        <div class="card-header">Total Alvará/Concelho</div>
                            <div class="card-body">
                              <h4 class="card-title" style="text-align: center; font-size: 50px">
                                  <?php 

                                  $sql="SELECT Count(id) AS id FROM utilizadores";
                                  $conculta = mysqli_query($conn, $sql);
                                  $dados = mysqli_fetch_array($conculta);
                                  echo $dados['id'];
                                  ?>
                                  <span style="font-size: 10px">/Utilizadores</span></h4>

                            </div>
                   </div>
              </div>
              
              <div class="col-md-4">
                  <div class="card border-primary mb-3" style="max-width: 18rem;">
                    
                        <div class="card-header">Total Alvará/Tipo</div>
                            <div class="card-body">
                              <h4 class="card-title" style="text-align: center; font-size: 50px">
                                  <?php 

                                  $sql="SELECT SUM(id) AS id FROM utilizadores";
                                  $conculta = mysqli_query($conn, $sql);
                                  $dados = mysqli_fetch_array($conculta);
                                  echo $dados['id'];
                                  ?>
                                  <span style="font-size: 10px">/Utilizadores</span></h4>

                            </div>
                   </div>
              </div>
              <div class="col-md-4">
                  <div class="card border-dark mb-3" style="max-width: 18rcm;">
                    
                        <div class="card-header">Alvará em Andamento</div>
                            <div class="card-body">
                              <h4 class="card-title" style="text-align: center; font-size: 50px">
                                  <?php 

                                  $sql="SELECT Count(id) AS id FROM utilizadores";
                                  $conculta = mysqli_query($conn, $sql);
                                  $dados = mysqli_fetch_array($conculta);
                                  echo $dados['id'];
                                  ?>
                                  <span style="font-size: 10px">/Utilizadores</span></h4>

                            </div>
                   </div>
              </div>
              
              
              
              
              
              
              
              
              
          </div>
          
          
          
          
          
          
          
          
      </div>
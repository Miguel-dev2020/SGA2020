<!-- logotipo do sistema -->
      <div id="div-logo"><img src="../img/logotipo-topo.png" width="250" height="85" alt=""/></div>
<!-- identificar o utilizador logado e oferecer opção de logoff -->
      <div id="div-utilizador">
            <?php session_start(); 
            echo "Olá: ". $_SESSION['utilizador'];?> 
            <br> <a href="../views/sair.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Terminar Sessão </a>
      </div>
<!-- banner do sistema -->
      <img src="../img/banner1-sga.png" width="1024" height="150" alt=""/>
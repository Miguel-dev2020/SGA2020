<!-- menú com nível de acesso para administrador-->
<?php 
    if($_SESSION['utilizadorNiveisAcessoId'] == "1"){ ?>
        <ul>
              <li><a href="../views/administracao.php"><i class="fa fa-plus" aria-hidden="true"></i> Administração</a>
                <ul>
                <li><a href="../views/utilizador.php">Utilizadores</a></li>
                <li><a href="../views/niveisdeacessos.php">Níveis de Acesso</a></li>
              </ul>

                </li>
              <li><a href="#parametrização"><i class="fa fa-plus" aria-hidden="true"></i> Parametrização</a>
                <ul>
                <li><a href="#tipodealvará">Tipo de Alvará</a></li>
                <li><a href="#niveldeensino">Nível de Ensino</a></li>
                <li><a href="#espaco">Espaço</a></li>
                </ul>
              </li>
            <li><a href="#gestão Diversa"><i class="fa fa-plus" aria-hidden="true"></i> Gestão Diversa</a>
                <ul>
                <li><a href="#entdeprocessos">Entrada de Processos</a></li>
                <li><a href="#estabdensino">Estabelecimento de Ensino</a></li>
                <li><a href="#infestabdensino">Infraestruturas de Estabelecimento de Ensino</a></li>
                    <li><a href="#rhestabdensino">Recursos Humanos ao Estabelecimento de Ensino</a></li>
                    <li><a href="#avalprocesso">Avaliação do Processo</a></li>
                    <li><a href="#parcerige">Parecer do IGE</a></li>
                    <li><a href="#parcerdne">Parecer do DNE</a></li>
                    <li><a href="#atrbdealvara">Atribuição de Alvará</a></li>
                </ul>

                </li>
            <li><a href="#estatística"><i class="fa fa-plus" aria-hidden="true"></i> Estatística</a>

                <ul>
                <li><a href="#alvaraporano">Alvará - Ano</a></li>
                <li><a href="#alvaraporconcelho">Alvará - concelho</a></li>
                <li><a href="#alvaraportipo">Alvará - Tipos</a></li>
                    <li><a href="#alvaradefeprov">Alvará - Provisório & Definitivos</a></li>
                    <li><a href="#alvaraemandamento">Alvará em Andamento</a></li>
                    <li><a href="#alvararecusado">Alvará - Recusado</a></li>
                    <li><a href="#alvaraporano">Alvará fora de data prorrogação</a></li>
                </ul>
                </li>
          </ul>
<!-- menú com nível de acesso para colaborador-->
    <?php 
  }else if($_SESSION['utilizadorNiveisAcessoId'] == "2"){ 
  ?>
        <ul>
              <li><a href="#parametrização"><i class="fa fa-plus" aria-hidden="true"></i> Parametrização</a>
                <ul>
                <li><a href="#tipodealvará">Tipo de Alvará</a></li>
                <li><a href="#niveldeensino">Nível de Ensino</a></li>
                <li><a href="#espaco">Espaço</a></li>
                </ul>
              </li>
            <li><a href="#gestão Diversa"><i class="fa fa-plus" aria-hidden="true"></i> Gestão Diversa</a>
                <ul>
                <li><a href="#entdeprocessos">Entrada de Processos</a></li>
                <li><a href="#estabdensino">Estabelecimento de Ensino</a></li>
                <li><a href="#infestabdensino">Infraestruturas de Estabelecimento de Ensino</a></li>
                    <li><a href="#rhestabdensino">Recursos Humanos ao Estabelecimento de Ensino</a></li>
                    <li><a href="#avalprocesso">Avaliação do Processo</a></li>
                    <li><a href="#parcerige">Parecer do IGE</a></li>
                    <li><a href="#parcerdne">Parecer do DNE</a></li>
                    <li><a href="#atrbdealvara">Atribuição de Alvará</a></li>
                </ul>

                </li>
          </ul>
<!-- menú com nível de acesso para visitantes-->
    <?php }else if($_SESSION['utilizadorNiveisAcessoId'] == "3"){ 
    ?>
        <ul>
              
            <li><a href="#estatística"><i class="fa fa-plus" aria-hidden="true"></i> Estatística</a>

                <ul>
                <li><a href="#alvaraporano">Alvará - Ano</a></li>
                <li><a href="#alvaraporconcelho">Alvará - concelho</a></li>
                <li><a href="#alvaraportipo">Alvará - Tipos</a></li>
                    <li><a href="#alvaradefeprov">Alvará - Provisório & Definitivos</a></li>
                    <li><a href="#alvaraemandamento">Alvará em Andamento</a></li>
                    <li><a href="#alvararecusado">Alvará - Recusado</a></li>
                    <li><a href="#alvaraporano">Alvará fora de data prorrogação</a></li>
                </ul>
                </li>
          </ul>
  
    <?php 
    } 
    ?>
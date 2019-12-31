<?php 

    // conexão com o banco de dados 

    $connect = mysqli_connect("localhost", "root", "", "bd-sga")or trigger_error(mysql_error(),E_USER_ERROR);
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from utilizadores"; 
    $utilizadores = mysqli_query($connect,$cmd); 
 
    //conta o total de itens 
    $total = mysqli_num_rows($utilizadores); 
 
    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 2; 
 
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    //seleciona os itens por página 
    $cmd = "select * from utilizadores limit $inicio,$registros"; 
    $utilizadores = mysqli_query($connect,$cmd); 
    $total = mysqli_num_rows($utilizadores); 
     
    //exibe os utilizadores selecionados 
	
    while ($utilizador = mysqli_fetch_array($utilizadores)) { 
        echo $utilizador['id']." - "; 
        echo $utilizador['utilizador']." - ";
        echo $utilizador['email']." - ";
		echo $utilizador['situacoe_id']." - "; 
		echo $utilizador['niveis_acesso_id']." - ";
        echo $utilizador['dt_criacao']." - "; 		
        echo $utilizador['dt_modificacao']."<br />"; 
    } 
     
    //exibe a paginação 

    for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='../views/paginacao-ut.php?pagina=$i'>".$i."</a> "; 
    } 

?>
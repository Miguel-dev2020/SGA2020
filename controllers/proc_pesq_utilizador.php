<?php
include("../views/connect.php");
//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'utilizador', 
	1 => 'Email',
	2=> 'dt_criacao'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_utilizadores = "SELECT utilizador, email, dt_criacao FROM utilizadores";
$resultado_utilizadores =mysqli_query($conn, $result_utilizadores);
$qnt_linhas = mysqli_num_rows($resultado_utilizadores);

//Obter os dados a serem apresentados
$result_utilizadores = "SELECT utilizador, email, dt_criacao FROM utilizadores WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_utilizadores.=" AND ( utilizador LIKE '".$requestData['search']['value']."%' ";    
	$result_utilizadores.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$result_utilizadores.=" OR dt_criacao LIKE '".$requestData['search']['value']."%' )";
}

$resultado_utilizadores=mysqli_query($conn, $result_utilizadores);
$totalFiltered = mysqli_num_rows($resultado_utilizadores);
//Ordenar o resultado
$result_utilizadores.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_utilizadores=mysqli_query($conn, $result_utilizadores);

// Ler e criar o array de dados
$dados = array();
while( $row_utilizadores =mysqli_fetch_array($resultado_utilizadores) ) {  
	$dado = array(); 
	$dado[] = $row_utilizadores["utilizador"];
	$dado[] = $row_utilizadores["email"];
	$dado[] = $row_utilizadores["dt_criacao"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json

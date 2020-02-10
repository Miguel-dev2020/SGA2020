<?php
session_start();	
	//Incluindo a conexão com banco de dados
     include_once("../views/connect.php");

	//O campo utilizador e senha preenchido entra no if para validar
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$utilizador = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$senha = md5($senha);
			
		//Buscar na tabela utilizadores o utilizador que corresponde com os dados digitado no formulário
		$result_utilizador = "SELECT * FROM utilizadores WHERE email = '$utilizador' && senha = '$senha' && situacoe_id = '1' LIMIT 1";
		$resultado_utilizador = mysqli_query($conn, $result_utilizador);
		$resultado = mysqli_fetch_assoc($resultado_utilizador);
		
		//Encontrado um utilizador na tabela utilizadores com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['utilizadorId'] = $resultado['id'];
			$_SESSION['utilizador'] = $resultado['utilizador'];
			$_SESSION['utilizadorNiveisAcessoId'] = $resultado['niveis_acesso_id'];
                        $_SESSION['utilizadorSituacoeId'] = $resultado['situacoe_id'];
			$_SESSION['utilizadorEmail'] = $resultado['email'];
			if($_SESSION['utilizadorNiveisAcessoId'] == "1"){
				header("Location: ../views/administracao.php");
			}elseif($_SESSION['utilizadorNiveisAcessoId'] == "2"){
				$destino = header("Location: ../views/colaborador.php");
			}else{
				$destino = header("Location: ../views/visitante.php");
			}
		//Não foi encontrado um utilizador na tabela utilizadores com os mesmos dados digitado no formulário
		//redireciona o utilizador para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['Erro_login'] = "Utilizador ou senha Inválido";
			$destino = header("Location: ../views/index.php");
		}
	//O campo utilizador e senha não preenchido entra no else e redireciona o utilizador para a página de login
	}else{
		$_SESSION['Erro_login'] = "Utilizador ou senha inválido";
		$destino = header("Location: ../views/index.php");
	}
?>
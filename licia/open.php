<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
require_once 'classes/conecta.php';

// $con = mysql_connect("127.0.0.1", "root", "digite a senha do banco aqui") or die ("Sem conexão com o servidor");
// $select = mysql_select_db("server") or die("Sem acesso ao DB, Entre em contato com o Administrador, gilson_sales@bytecode.com.br");

// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = "SELECT * FROM integradora_user WHERE login_user = '$login' AND senha_user= '$senha'";
$rs_user = pg_query($bd_licia, $result) or die("Erro ao checar usuarios da integradora!! " . $result ); 
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(pg_num_rows ($rs_user) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:dados2.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.php');
	
	}
require_once 'classes/desconecta.php';
?>
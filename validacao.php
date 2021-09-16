<?php

if(!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: index.php"); exit;
}

require 'sql.php';

$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);


$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sql = "SELECT `id`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario."') AND (`senha` = '".sha1($senha)."') AND (`ativo` = 1) LIMIT 1";
$query = mysqli_query($conexao, $sql);

 
if(mysqli_num_rows($query) != 1) {
	echo "Login inválido!"; exit;
} else {
	$resultado = mysqli_fetch_assoc($query);
	
	if(!isset($_SESSION)) session_start();
	
	$_SESSION['UsuarioID'] = $resultado['id'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel'];
	
	header("Location: lista.php"); exit;
	
}


?>

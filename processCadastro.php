<?php

if(!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: cadastro.php");
}

include 'sql.php';

$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$validation = mysqli_query($conexao, 'SELECT `usuario` FROM `usuarios` WHERE `usuario` = "'.$usuario.'"');

if (mysqli_num_rows($validation) == 1) {
	echo "Usuário já existente";
} else {
	
	$sql = "INSERT INTO `usuarios` VALUES (NULL, '".$usuario."', SHA1('".$senha."' ), 1, 1);";
	$rs = mysqli_query($conexao, $sql);
	
	if($rs) {
		$sqlId = mysqli_query($conexao, "SELECT `id` FROM `usuarios` WHERE `usuario` = '".$usuario."'");
		$id = mysqli_fetch_assoc($sqlId);
		$sqlTable = "CREATE TABLE `animes".$id["id"]."` (
		`idAnime` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
		`Nome` VARCHAR(100) NOT NULL,
		`Visto` BOOLEAN NOT NULL
		)";
		
		$table = mysqli_query($conexao, $sqlTable);
		
		if($table) {
			header("Location: index.php");
		} else {
			echo "Fala com o Victor que deu erro";
		}
		
	} else {
		echo "Falha ao cadastrar";
	}
	
}

?>


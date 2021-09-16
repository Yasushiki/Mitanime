<!DOCTYPE html>

<html lang="pt-BR">

	<head>
		<meta charset='UTF-8'>
		<meta http-equiv="X-UA-Compatible" content="IE-Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<title>Mitanime - Adicionar anime</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/custom.css?version=52">
	</head>

	<body>
		<a href="lista.php"><h1>ミタニメ</h1></a>
		
		<br><br>
		
<?php

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	
	header("Location: index.php");
}

include 'sql.php';

$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);

$Nome = $_POST["Nome"];

if(end($_POST) == "on") {
	$Visto = "1";
} else {
	$Visto = "0";
} 
$rs = false;
if($Nome != "") {
	
	$resultado = mysqli_query($conexao ,"SELECT * FROM animes".$_SESSION['UsuarioID']." WHERE Nome = '".$Nome."'");
	if(mysqli_num_rows($resultado)!=0) {
		$repetido = true;
		
	} else {
		$sql = "INSERT INTO Animes".$_SESSION['UsuarioID']." (Nome, Visto) VALUES ('".$Nome."', ".$Visto.")";
		$rs = mysqli_query($conexao, $sql);
		$repetido = false;
	}
}

if($rs) {
	echo "<p>$Nome adicionado com sucesso!</p>";
} else {
	if(!$repetido) {
		echo "<p>Falha ao tentar adicionar $Nome</p>";
	} else {
		echo "<p>$Nome já foi previamente adicionado</p>";
	}
}	

?>
		
		<a href="lista.php"><p>Voltar para a página inicial</p></a>
		<a href="addAnime.php"><p>Adicionar outro anime<p></a>
		
	</body>
<html>

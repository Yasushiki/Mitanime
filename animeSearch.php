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

$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);;


$Nome = $_POST["Nome"];


$sql = "SELECT Nome, Visto FROM Animes".$_SESSION['UsuarioID']." WHERE Nome LIKE '%".$Nome."%'";
$rs = mysqli_query($conexao, $sql);
$animeList = array();

while($reg = mysqli_fetch_assoc($rs)) {
	$animeList[] = array(($reg["Nome"]),($reg["Visto"]));
	
}

if(empty($animeList)) {
	echo "<p align='center'>Não foi achado nenhum anime com esse nome :(</p>";
} else {
	
	if(count($animeList) > 1) {
		echo "<p align='center'>Foram achados ".count($animeList)." animes: </p>";
	} else {
		echo "<p align='center'>Foi achado 1 anime:</p>";
	}
	
	sort($animeList);
	
	foreach($animeList as $anime) {
		if($anime[1] == '1') {
			echo "<p class='wAnime'>$anime[0]</p>";
		} else {
			echo "<p class='uAnime'>$anime[0]</p>";
		}
		
	}
}

?>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</body>
<html>

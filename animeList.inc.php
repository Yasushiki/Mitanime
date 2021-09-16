<?php

function get_anime_list($visto) {
	
	include 'sql.php';
	
	$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);
		
	$sql = "SELECT `Nome` FROM Animes".$_SESSION['UsuarioID']." WHERE `Visto` = $visto";
	$rs = mysqli_query($conexao, $sql);
	$animeList = array();

	while($reg = mysqli_fetch_assoc($rs)) {
		$animeList[] = ($reg["Nome"]);
	}
	
	return $animeList;
}
?>
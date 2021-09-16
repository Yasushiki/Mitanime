<?php
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	
	header("Location: index.php");
}

include 'sql.php';

$conexao = mysqli_connect($sql_index[0], $sql_index[1], $sql_index[2], $sql_index[3]);

// Deleta o anime
if($_POST["Excluir"] == '1') {
	
	$sql = "DELETE FROM Animes".$_SESSION['UsuarioID']." WHERE Nome = '".$_POST["NomeOri"]."'";
	$rs = mysqli_query($conexao, $sql);

} 

// Edita o anime
else {
	
	$Nome = $_POST["Nome"];
	$NomeOri = $_POST["NomeOri"];

	if($_POST["Visto"] == "1") {
		$Visto = "1";
	} else {
		$Visto = "0";
	}

	if($Nome != "") {
		$sql = "UPDATE Animes".$_SESSION['UsuarioID']." SET Nome = '".$Nome."', Visto = ".$Visto." WHERE Nome = '".$NomeOri."' ";
		$rs = mysqli_query($conexao, $sql);
	} else {
		header("refresh:0; url=lista.php");
	}
	
}

header("refresh:0; url=lista.php");
?>

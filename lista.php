<!DOCTYPE html>

<html lang="pt-BR">
	
	<head>
		<meta charset='UTF-8'>
		<meta http-equiv="X-UA-Compatible" content="IE-Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<title>Mitanime</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/custom.css?version=53">
	</head>
	
	<body>
	
<?php

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	
	header("Location: index.php");
}

?>
		<a href="lista.php"><h1>ミタニメ</h1></a>
		
<!--Cria os arrays com os animes e ordena eles-->
<?php
require "animeList.inc.php";

$wAnimes = get_anime_list("1");
$uAnimes = get_anime_list("0");

$Animes = array_merge($uAnimes, $wAnimes);


sort($wAnimes);
sort($uAnimes);
sort($Animes);


$wa = count($wAnimes);
$ua = count($uAnimes);
?>
		
		<?php echo "<p align='center'>Você já viu <b>$wa</b> animes</p>";?>
		<?php echo "<p align='center'><b>$ua</b> animes estão na geladeira</p>";?>
		
		<!--Botão e caixa de pesquisa-->
		<div class="component">
			<script>
				function validateForm() {
					var a = document.forms["Form"]["Nome"].value;
					if(a == "") {
						alert("Insira um nome para realizar uma pesquisa");
						return false;
					}
				}
			</script>
			
			<form name="Form" class="searchBox" action="animeSearch.php" onsubmit="return validateForm()" method="POST">
				<input type="searchbox" name="Nome" maxlength="100" placeholder="Pesquisar..."></input>
			</form>
			
			<a href="addAnime.php">
				<button class="asButton">Adicionar anime</button>
			</a>
		</div>

		
		<!--Cria os botões da aba-->
		<div class="tab">
			<button class="tablinks active" onclick="openCondition(event, 'All')">Todos os animes</button>
			<button class="tablinks" onclick="openCondition(event, 'Watched')">Animes vistos</button>
			<button class="tablinks" onclick="openCondition(event, 'Unwatched')">Animes não vistos</button>
		</div>
		
		<!--Mostra todos os animes-->
		<div id="All" class="tabcontent" style="display: block;">
<?php
include_once 'modal.inc.php';

	for($i = 0; $i < count($Animes); $i++){
		if(in_array($Animes[$i], $wAnimes)) {
			$class = 'wAnime';
			$visto = true;
		} else {
			$class = 'uAnime';
			$visto = false;
		}
		
		echo createModal($Animes[$i], $class, "anime", $i, $visto);

	}
?>

		</div>
		
		<!--Mostra os animes vistos-->
		<div id="Watched" class="tabcontent" style="display: none;">
			<?php for($i = 0; $i < count($wAnimes); $i++) 
				echo createModal($wAnimes[$i], "wAnime", "wAnime", $i, true);
			?>
		</div>
		
		<!--Mostra os animes não vistos-->
		<div id="Unwatched" class="tabcontent" style="display: none;">
			<?php for($i = 0; $i < count($uAnimes); $i++)
				echo createModal($uAnimes[$i], "uAnime", "uAnime", $i, false);
			?>
		</div>
		
		<script src="scripts/animeTab.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script>
		function block(a, b, c) {
		  if (document.getElementById(a).checked) {
			document.getElementById(b + "idN" + c).disabled = true;
			document.getElementById(b + "idV" + c).disabled = true;
		  } else {
			document.getElementById(b + "idN" + c).disabled = false;
			document.getElementById(b + "idV" + c).disabled = false;
		  }
		}
		</script>
		<div class="component">
			<a href="logout.inc.php">
				<button class="asButton">Deslogar</button>
			</a>
		</div>
	</body>
	
</html>

<!DOCTYPE html>

<html lang="pt-BR">

	<head>
		<meta charset='UTF-8'>
		<meta http-equiv="X-UA-Compatible" content="IE-Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		
		<title>Mitanime - Adicionar anime</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/custom.css?version=53">
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

$a = array("Naruto", "Dragon Ball", "Shingeki no Kyojin", "Blend S", 
"Abenobashi", "Kaguya-sama wa Kokurasetai", "Kimetsu no Yaiba", "Nyan Koi!",
"Aho Girl", "Mob Psyco 100", "Hataraku Maou-sama");
$s = sizeof($a) - 1;
$b = $a[rand(0, $s)];
?>
		<div class="component">
			<form name="Form" action="processAddAnime.php" onsubmit="return validateForm()" method="POST">
				<input class="textBox" type="text" name="Nome" maxlength="100" placeholder=<?php echo "'$b...'";?>>
				<p>Visto: <input type="checkbox" name="Visto"></p>
				<input class="asButton" type="submit" value="Adicionar">
			</form>
		</div>
		
		<script>
			function validateForm() {
				var a = document.forms["Form"]["Nome"].value;
				if(a == "") {
					alert("Insira um nome");
					return false;
				}
			}
		</script>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</body>
<html>

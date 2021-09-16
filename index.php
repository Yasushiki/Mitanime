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

if(isset($_SESSION['UsuarioID'])) {
	header("Location: lista.php");
} 

?>
		
		<br />
		
		<div class="login">
			<form name="Form" action="validacao.php" method="post" onsubmit="return validateForm()">
				<fieldset>
					<table cellspacing="0" border="3px">
						<tr align="center">
							<th colspan="3">Login</th>
						</tr>
						<tr>
							<td colspan="1"><label for="txUsuario">Usuário</label></td>
							<td colspan="2"><input type="text" name="usuario" id="txUsuario" maxlength="25" /></td>
						</tr>
						<tr>
							<td colspan="1"><label for="txSenha">Senha</label></td>
							<td colspan="2"><input type="password" name="senha" id="txSenha" /></td>
						</tr>
						<tr align="center">
							<td colspan="3"><input type="submit" value="Entrar" /></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
		
		<br /><br />
		
		<div class="login">
			<a href="cadastro.php"><button class="asButton">Cadastrar</button></a>
		</div>
		
		<script>
			function validateForm() {
				var a = document.forms["Form"]["usuario"].value;
				var b = document.forms["Form"]["senha"].value;
				if(a == "" || b == "") {
					alert("Insira todos os dados");
					return false;
				}
			}
		</script>
		
	</body>
	
</html>

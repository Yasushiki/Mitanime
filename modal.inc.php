<?php // Cria o modal de edição do anime
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	
	header("Location: index.php");
}

function createModal($lista, $class, $name, $i, $visto) {
	
	$check = '';
	
	if($visto == true) {
		$check = 'checked';
	} else {
		$check = '';
	}
	
	$cofirmation = "'Você tem certeza que deseja excluir ".$lista." ?'";
	
	return 
'
<button type="button" class="coisaAnime" data-bs-toggle="modal" data-bs-target="#'.$name.$i.'">
<p class="'.$class.'">'.$lista.'</p>
</button>

<div class="modal fade" id="'.$name.$i.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="'.$name.'ModalLabel">'.$lista.'</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		<div class="component">
			<form id="'.$name.'Edit'.$i.'" name="Edit" action="processEditAnime.php" method="POST">
			
				<input name="NomeOri" type="hidden" value="'.$lista.'">
				<input id="'.$name.'idN'.$i.'" class="textBox" type="text" name="Nome" maxlength="100" value="'.$lista.'">
				
				<input type="hidden" name="Visto" value="0">
				<p>Visto: &emsp;&emsp;&ensp;<input id="'.$name.'idV'.$i.'" type="checkbox" name="Visto" value="1" '.$check.'></p>
				
				<label form="'.$name.'Edit'.$i.'" for="'.$name.'cb'.$i.'"></label>
				<input type="hidden" name="Excluir" value="0">
				<p><b>EXCLUIR: </b><input id="'.$name.'cb'.$i.'" onchange="block(\''.$name.'cb'.$i.'\', \''.$name.'\', \''.$i.'\')" type="checkbox" name="Excluir" value="1"></p>
				
				
			</form>
		</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
		<button type="submit" form="'.$name.'Edit'.$i.'" value="Editar" class="btn-primary">Salvar mudanças</form>
	  </div>
	</div>
  </div>
</div>
<br>

';
}

?>

<?php

$a = 1;

// Checa se é localhost ou não
if($a == 1) {
	$sql_index = array("localhost", "root", "", "rmitanime");
} else {
	// Se não for localhost, colocar os dados do MySQL aqui
	$sql_index = array("***", "***", "***", "***");
}

?>

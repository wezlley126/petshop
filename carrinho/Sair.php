<?php
	//comando que encerra a sessão do usuário;
	session_start();
	// session_destroy();
	foreach ($_SESSION['lista_de_pedidos'] as $key => $value) {
		// code...
		unset($_SESSION[$key]);
	}
	unset($_SESSION['carrinho_not_null']);
	header("location: ../");
?>

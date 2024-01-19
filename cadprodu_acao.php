<?php 

	require_once '../../projeto/cadprodu_services.php';
	$acao = new ProdutoService();

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";


	if (!Empty(trim($_POST['nome'])) && !Empty(trim($_POST['valor'])) && !Empty(trim($_POST['descricao']))) {

		$acao->inserir($_POST['nome'],$_POST['valor'],$_POST['descricao'],$_POST['img']);


	}

?>
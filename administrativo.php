<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<script src="https://kit.fontawesome.com/2afc7f22a6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style-adm.css">

    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #eee; ">


	<!-- CABEÇALHO -->

	<header style="background-color: #CF1223; height: 13vh;" class="row no-gutters cabecalho align-items-center shadow">
		<div class="col-12">
	    	<h1 class="text-center text-white">ADMINISTRATIVO</h1>
		</div>
	</header>




	<!-- MENU LATERAL -->
	<div class="row no-gutters">
		<div class="col-2 shadow-sm shadow" style="height: 87vh; background-color: #CF1223;">
			<div class="list-group rounded shadow-sm " style="background-color: #eee;">
				  <button type="button" class="list-group-item list-group-item-action shadow">Cadastro de Produto</button>
				  <button type="button" class="list-group-item list-group-item-action shadow">Cadastro de Categoria</button>
				  <button onclick="montarListaProdutos('container-dinamico')" type="button" class="list-group-item list-group-item-action shadow">Visualizar Cardapio</button>
				  <button type="button" class="list-group-item list-group-item-action shadow">Pedidos</button>
			</div>
		</div>





		<div id='container-dinamico' style="height: 87vh;" class="col-10 overflow-auto">


			<!-- CAD PRODU -->

			<form class="container mt-2 p-3 rounded" style="width: 40vw; background: white; display: none;">

			  <div class="form-group">
			    <label for="cadprodu_nome">Nome do Produto</label>
			    <input type="text" class="form-control" id="cadprodu_nome">
			  </div>

			  <div class="form-group">
			    <label for="cadprodu_desc">Descrição</label>
			    <textarea style="resize: none;" class="form-control" id="cadprodu_desc" rows="2"></textarea>
			  </div>
			  <div class="form-group">
				<label for="cadprodu_valo">Preço</label>
			    <input type="number" class="form-control" id="cadprodu_valo">
			  </div>

			  <div class="form-group">
				<select  class="custom-select">
				  <option selected>Escolha uma categoria</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			  </div>

			  <div class="form-group">
			  	<label for="custom-file-foto">Foto</label>
				<div id="custom-file-foto" class="custom-file">
				    <input type="file" class="custom-file-input" id="cadprodu_foto">
				    <label class="custom-file-label" for="customFile">Escolha a imagem</label>
			  	</div>
			  </div>

			  
			  <button type="submit" class="btn btn-danger" style="color: white; background-color: rgb(207, 18, 35); font-weight: 500;">Confirmar</button>
			</form>



			<!-- CAD CATEGORIA -->

			<form class="container mt-2 p-3 rounded" style="width: 40vw; background: white;">

			  <div class="form-group">
			    <label for="cadcateg">Nome da Categoria</label>
			    <input type="text" class="form-control" id="cadcateg">
			  </div>

			  

			  
			  <button type="submit" class="btn btn-danger" style="color: white; background-color: rgb(207, 18, 35); font-weight: 500;">Confirmar</button>
			</form>


			<div class="form-group container mt-2 p-3 rounded" style="width: 40vw; background: white; ">
				<label for="listaCateg">Categorias ja cadastradas</label>
				<select class="custom-select" aria-describedby="desc-categ">
				  <option selected>Escolha uma categoria</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
				<small id="desc-categ" class="form-text text-muted">Apenas visualização..</small>
			</div>





			<!-- LISTA CARDAPIO -->


		</div>
	</div>

	<script src="adm-funcoes.js"></script>
</body>
</html>
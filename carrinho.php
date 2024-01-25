<?php  

echo "<pre>";

print_r($_POST);

echo "</pre>";

$dadosProdutoJSON = $_POST['carrinho-json'];

// Converter o JSON de volta para um array
$dadosProduto = json_decode($dadosProdutoJSON, true);


print_r($dadosProduto);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho</title>
	<script src="https://kit.fontawesome.com/2afc7f22a6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
    <script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #eee;">
	<header>
		<div class="row no-gutters">
			<div style="background-color: #fff; height: 10vh;" class="col-12 d-flex text-center align-items-center shadow">

				<a href="cardapio.php" class="btn hover ml-5 fs-3">
					<i style="color: #CF2404; font-size: 1.3rem;" class="fa-solid fa-arrow-left"></i>
				</a>

				<h6 style="color: #CF2404; font-size: 1.3rem; font-weight: BOLD;" class="p-2 mt-1">PEDIDO</h6>
			</div>
		</div>




		<div class="container">
			<div style="height: 70vh;" class="row no-gutters">
				<div class="col-12">
					a
				</div>
			</div>
		</div>


		<div style="height: 20vh;" class="row no-gutters">
			<div style="background-color: #fff;" class="col-12 shadow text-center align-items-center">
				<h6 class="m-4">
					<span>
						TOTAL
					</span>
					<span> R$ 150</span>
				</h6>
				<button style="width:50%" class="btn btn-lg btn-danger">FINALIZAR</button>
			</div>
		</div>
	</header>
</body>
</html>
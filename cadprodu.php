<?php  
	
	require_once '../../projeto/conexao.php';


	$conexao = new Conexao();

	$conexao->conectar();






?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Produto</title>
	<script src="https://kit.fontawesome.com/2afc7f22a6.js" crossorigin="anonymous"></script>

	<style>


		* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }



    /*  cabeçalho  */

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #f2f2f2;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    .header-itens {
      display: flex;
      gap: 20px;
    }

    .header-itens a {
      font-size: 24px;
      margin-right: 15px;
      text-decoration: none;
    }

    .header-itens a:hover {
      box-shadow: 0 0 0 5px lightgray; 
      background-color: lightgray;
      border-radius: 10px;
    }
    .header-itens a:before,a:active, a:focus {
      outline: none;
      color: black;
    }

    .status-sucesso{
    	margin-left: -250px;
    	padding: 10px;
    	background-color: lightseagreen;
    }

    .status-falha{
    	margin-left: -250px;
    	padding: 10px;
    	background-color: indianred;
    }



    /*CONTEUDO*/

    .container {
		 max-width: 800px;
		 margin: 60px auto;
		 padding: 20px;


/*margin-top: 77px;*/
		}

		form {
		 display: flex;
		 flex-direction: column;
		 gap: 10px;
		}

		form input,
		form textarea {
		 width: 100%;
		 padding: 10px;
		 font-size: 18px;
		}

		form button {
		 padding: 10px 20px;
		 background-color: #f2f2f2;
		 border: none;
		 cursor: pointer;
		 font-size: 24px;
		}

		form label {
		 display: block;
		 margin-bottom: 5px;
		 font-weight: bold;
		}

		form div {
		 margin-bottom: 20px;

		}



		
	</style>


    

</head>
<body>


  <header>
    <h1>Cadastro de produto</h1>

    <?php 
    	if(isset($_GET['success']) && $_GET['success'] == 'S'){
    ?>

    	<p class="status-sucesso">Produto Cadastrado com Sucesso!!</p>

    <?php
    }else if(isset($_GET['success']) && $_GET['success'] == 'N'){
    ?>

			<p class="status-falha">Houve um erro ao cadastrar produto!</p>
		<?php 
			}
		?>
    <div class="header-itens">
      <a  href="cardapio.php" class="fa-solid fa-left-long"></a>
      <a  class="fa-solid fa-right-from-bracket"></a>
    </div>
  </header>

  <div class="container">
		<h2>Formulário de cadastro</h2>

		<form action="cadprodu_acao.php" method="post">
			<div>
				<label for="nome">Nome do produto:</label>
				<input type="text" id="nome" name="nome" required>
			</div>

			<div>
				<label for="valor">Valor:</label>
				<input type="number" id="valor" name="valor" min="0.5" step="0.01" required>
			</div>

			<div>
				<label for="descricao">Descrição:</label>
				<textarea id="descricao" name="descricao" rows="4" required></textarea>
			</div>

			<div>
				<label for="Imagem">Imagem:</label>
				<input type="file" id="caminho-imagem" name="img">
			</div>

			<button type="submit">Cadastrar</button>
		</form>
	</div>

	
</body>
</html>


<?php
  
  #require_once '../../projeto/conexao.php';
  #require_once '../../projeto/cadprodu_services.php';

  #$conexao = new Conexao();

 # $pdo = $conexao->conectar();

  #$servico = new produtoService();


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/2afc7f22a6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>






  <!--<link rel="stylesheet" href="style.css">-->


  <title>Cardapio</title>

</head>


<body style="background-color: #eee;">
    
  <header style="background-color: #CF1223; height: 13vh;" class="row no-gutters cabecalho align-items-center shadow-sm">

    <div class="col-4">
      <img height="50px" src="imagens/emp-logo.jpg" class="ml-3 rounded" alt="">
    </div>

    <div class="col-4">
      
    </div>


    <div class="col-4 text-right align-middle">
      <button onclick="adicionarProdutosAoModal()" data-toggle="modal" data-target=".bd-example-modal-xl" id="botao-carrinho" disabled class="btn btn-dark mr-4">
        <span>
          <span>PEDIDO</span>
          <i class="fa-solid fa-cart-shopping"></i>
          <span style="display: none;" id="contador-carrinho" class="badge badge-pill badge-secondary">0</span>
        </span>
      </button>
    </div>
  </header>



  <div class="row no-gutters" >
    <div class="col-3 overflow-auto" style="height: 87vh;">
      <div class="list-group">
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">The current link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A second link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A third link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A fourth link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A disabled link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">The current link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A second link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A third link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A fourth link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A disabled link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">The current link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A second link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A third link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A fourth link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A disabled link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">The current link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A second link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A third link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A fourth link item</a>
        <a style="background-color: #eee; font-weight: 500; color: #212529;" href="#" class="list-group-item list-group-item-action hover">A disabled link item</a>

      </div>
    </div>

    <div class="col-9 border-left overflow-auto"  style="height: 87vh;" >

      <!---TITULO DA EMPRESA -->

      <div class="row no-gutters align-items-center">
        <h1 class="col-12 text-center">NOME DA EMPRESA</h1>
      </div>    

       <!---LINHA PRODUTO -->

      <div  class="row no-gutters align-items-center border-bottom p-2 hover" data-toggle="modal" data-target="#exampleModal" onclick="coletaDados()">

        <div class="col-2 ">
          <img height="80px" src="imagens/teste.jpg" class="rounded" alt="" >
        </div>

        <div class="col-8 ">
          <p id="nome-produto" style="font-weight: bolder; margin-bottom:">SEM NOME</p>
          <p id="descricao-produto" class="text-truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum exercitationem consequuntur sint aut maiores! Vero praesentium, repellat iusto dolo.</p>
        </div>

        <div class="col-2 text-center p-2">
          <span>R$ </span>
          <span id="preco-produto">99.99</span>
        </div>

      </div>

      
  </div>


<!-- Modal Produtos -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
      <div style="background-color:#eee;" class="modal-content">

          <!-- HEADER DO MODAL-->

        <div style="background-color: #CF1223;" class="modal-header">

          <h5 style="color:white;" class="modal-title" id="titulo-modal">Modal title</h5>   



          <!-- TITULO DO MODAL-->


          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i style="color:white; font-weight: 700;" class="fa-solid fa-circle-xmark"></i></span>
          </button>
        </div>
        <div class="modal-body ">    <!-- CORPO DO MODAL -->

          <div class="text-center">
            <img class="rounded" height="200px" src="imagens/teste.jpg" alt="">
          </div>

          <p class="mt-4 text-start" id="descricao-modal" name ="descricao">a</p>


          <div style="background-color: #fff;" class="text-center rounded p-2">
            <h6>
              <span><i class="fa-solid fa-comment-dots"></i></span>
              <span>Alguma Observação?</span>
            </h6>
            <textarea style="resize: none; width:80%; height: 32px; overflow: hidden;" aria-invalid="false" name="observacao" id="observacao-modal" cols="30" rows="1"></textarea>
          </div>
        </div>


           

            <!-- RODAPE MODAL -->



        <div class="d-flex justify-content-between modal-footer">
          <div  class="d-flex flex-row align-items-center">
            <button onclick="contador('-','contador-valor','preco-produto','total-modal')" style="gap: 3px;" class="btn btn-sm">-</button>
            <h6 id="contador-valor" class="mt-2 mx-3">1</h6>
            <button onclick="contador('+','contador-valor','preco-produto','total-modal')" class="btn btn-sm">+</button>
          </div>

          <div>
            <button data-dismiss="modal" onclick="adicionarCarrinho()" style="color: white; background-color: #CF1223; font-weight:500"  class="btn btn-danger">

              <span>Adicionar</span>
              <span>R$ </span>
              <span id="total-modal"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>





<!-- MODAL CARRINHO-->

  <div id="modal-carrinho" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">


<!-- HEADER MODAL -->

      <div style="background-color:#CF1223;" class="modal-header">
        <button href="cardapio.php" class="btn hover">
        <i style="color: white; font-size: 1.3rem;" class="fa-solid fa-arrow-left"></i>
        </button>

        <h6 style="color: white; font-size: 1.3rem; font-weight: BOLD;" class="p-2 mt-1">PEDIDO</h6>




      </div>

      <!-- PRODUTOS CARRINHO MODAL-->
      <div id="conteudo-modal-produtos" class="modal-body ml-3">
        
      
      </div>



      <div style="display: none;" id="conteudo-modal-dados-cliente" class="modal-body">
        <div class="row container ">
          <div style="border: 1px solid black" class="col">
            <form action="">


              <div class="form-group">
                <label for="dados-cliente-nome">Nome Completo</label>
                <input class="form-control" type="text" id="dados-cliente-nome" required>
              </div>

              <div class="form-group">
                <label for="dados-cliente-nome">Endereço</label>
                <input class="form-control py-2 my-2" type="text" id="dados-cliente-rua" placeholder="Rua" required>
                <input class="form-control py-2 my-2" type="text" id="dados-cliente-bairro" placeholder="Bairro" required>
                <input class="form-control py-2 my-2" type="text" id="dados-cliente-numero" placeholder="Número" required>
                <input class="form-control py-2 my-2" type="text" id="dados-cliente-complemento" placeholder="Complemento">

              </div>

              <div class="form-group">
                <label for="dados-cliente-nome">Nome Completo</label>
                <input class="form-control" type="text" id="dados-cliente-nome">
              </div>


            </form>
          </div>
        </div>
      </div>
      


      <!-- CARRINHO FOOTER -->

      <div class="d-flex justify-content-between modal-footer">

        <div id="total-carrinho">
          <span>TOTAL R$</span>
          <span id="total-carrinho-valor"></span>
        </div>

          <div>
            <!-- data-dismiss="modal" -->
            <button onclick="alternaCarrinho()"  style="color: white; background-color: #CF1223; font-weight:500"  class="btn btn-danger">
              <span>FINALIZAR</span>
            </button>
          </div>
        </div>

     
      </div>
      </div>


    </div>
  </div>
</div>









  <form id="carrinhoForm" action="carrinho.php" method="post">
        <input id="carrinho-produtos" type="hidden" name="produtos">
    </form>

 <script src="funcoes.js"></script>

</body>


</html>

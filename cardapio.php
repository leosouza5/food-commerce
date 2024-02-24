<?php
  require_once 'cadprodu_services.php';


  $servico = new produtoService();
  $listaprodutos = $servico->recuperar("*","produtos","","");

  $JSONProdutos = json_encode($listaprodutos);




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
  <script>
         var JsonProdutos = <?= $JSONProdutos?>;

  </script>





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
      <button onclick="adicionarProdutosAoModal();alternaCarrinho(1)" data-toggle="modal" data-target=".bd-example-modal-xl" id="botao-carrinho" disabled class="btn btn-dark mr-4">
        <span>
          <span>PEDIDO</span>
          <i class="fa-solid fa-cart-shopping"></i>
          <span style="display: none;" id="contador-carrinho" class="badge badge-pill badge-secondary">0</span>
        </span>
      </button>
    </div>
  </header>



  <div class="row no-gutters" >




    <!-- BARRA LATERAL -->


    <div class="col-2 overflow-auto" style="height: 87vh;">
      <div id="categorias-lista" class="list-group d-flex" style="height: 87vh; background-color: #CF1223; ">
        <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
        <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
        <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
      </div>
    </div>

    <div id="listaProdutosDinamicos" data-spy="scroll" data-target="#categorias-lista" data-offset="0" class="col-10 border-left overflow-auto"  style="height: 87vh;" >

      <!---TITULO DA EMPRESA -->

      <div class="row no-gutters align-items-center">
        <h1 class="col-12 text-center">NOME DA EMPRESA</h1>
      </div>    

       <!---LINHA PRODUTO -->

      <div id="list-item-1" style="position: relative;"  class="row no-gutters align-items-center border-bottom p-2 hover" data-toggle="modal" data-target="#modal-dados-produto" onclick="coletaDados()">

        <div class="col-2 ">
          <img  height="80px" src="imagens/teste.jpg" class="rounded" alt="" >
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
  <div class="modal fade" id="modal-dados-produto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <img id="foto-modal" class="rounded" height="200px" src="imagens/teste.jpg" alt="">
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
            <button id="contador-menos" style="gap: 3px;" class="btn btn-sm">-</button>
            <h6 id="contador-valor" class="mt-2 mx-3">1</h6>
            <button id="contador-mais" class="btn btn-sm">+</button>
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
        <button style="display: none;" onclick="alternaCarrinho(1)" id="botao-carrinho-voltar" href="cardapio.php" class="btn hover">
        <i style="color: white; font-size: 1.3rem;" class="fa-solid fa-arrow-left"></i>
        </button>

        <h6 style="color: white; font-size: 1.3rem; font-weight: BOLD;" class="p-2 mt-1">PEDIDO</h6>




      </div>

      <!-- PRODUTOS CARRINHO MODAL-->
      <div id="conteudo-modal-produtos" class="modal-body ml-3">
        
      
      </div>



      <div style="display: none;" id="conteudo-modal-dados-cliente" class="modal-body">
        <div class="row container ">
          <div class="col">
            <form id="formulario-dados-cliente" action="carrinho.php" method="POST">


              <div class="form-group rounded shadow p-4">
                <label for="dados-cliente-nome">Nome Completo</label>
                <span style="display: none;" id="erro-cliente-campo" class="alert alert-info ">Porfavor informe um nome válido</span>
                <input class="form-control" type="text" id="dados-cliente-nome" name="nome" required>
              </div>

              <div class="form-group rounded shadow p-4">

                <div id="dados-cliente-endereco">
                  <span id="span-dados-endereco">
                    <label for="dados-cliente-rua">Endereço</label> 
                    <span style="display: none;" id="erro-endereco-campo" class="alert alert-info ">Por favor preencha os campos <b>RUA, BAIRRO e NUMERO</b></span></span>
                    <input class="form-control py-2 my-2" name="rua" type="text" id="dados-cliente-rua" placeholder="Rua" required>
                    <input class="form-control py-2 my-2" name="bairro" type="text" id="dados-cliente-bairro" placeholder="Bairro" required>
                    <input class="form-control py-2 my-2" name="numero" type="text" id="dados-cliente-numero" placeholder="Número" required>
                    <input class="form-control py-2 my-2" name="complemento" type="text" id="dados-cliente-complemento" placeholder="Complemento"> 
                  </span>
                  

                </div>
                
                <div class="custom-control custom-switch mt-4">
                  <input type="checkbox" class="custom-control-input" name="retirar-loja" id="checkbox-retirar-pedido">
                  <label for="checkbox-retirar-pedido" class="custom-control-label">RETIRAR NA LOJA</label>
                </div>




              </div>

              <div class="form-group rounded shadow p-4">
                <span style="display: none;" id="erro-pagamento-campo" class="alert alert-info ">Porfavor informe uma forma de pagamento válida</span>
                <label for="dados-cliente-metodo-pagamento">Forma de Pagamento</label>
                <small id="instrucao-pagamento" class="form-text text-muted">Todas as formas de pagamento serão recebidos na hora da entrega ou retirada...</small>
                <select class="form-control" name="metodo-pagamento" id="dados-cliente-metodo-pagamento">
                  <option value="" selected>Escolha...</option>
                  <option value="dinheiro">Dinheiro</option>
                  <option value="cartao">Cartao</option>
                  <option value="pix">Pix</option>

                </select>



                <!-- INPUT SIMBOLICO PARA PRODUTOS-->
                <input id="dados-carrinho-produtos" name="carrinho-json" type="hidden">  


                <span style="display: none;" id="divTroco">
                  <label class="mt-4" for="dados-cliente-precisa-troco">Precisa de Troco ?</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <select class="form-control" id="dados-cliente-precisa-troco">
                        <option value="sim">Sim</option>
                        <option selected value="nao">Nao</option>
                      </select>
                    </div>
                    <input disabled id="dados-cliente-valor-troco" name="valor-troco" class="form-control" type="number">
                  </div>
                </span>
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

            <button id="botao-carrinho-proximo" onclick="alternaCarrinho(2)" style="color: white; font-weight:500" class="btn btn-warning">
              <span>PROXIMO</span>
            </button>

            <button id="botao-carrinho-finalizar" type="button" onclick="finalizarVenda()" style="color: white; background-color: #CF1223; font-weight:500; display: none;"  class="btn btn-danger">
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

 <script src="funcoes.js">
  $('#listaProdutosDinamicos').scrollspy({ target: '#categorias-lista' });
 </script>


</body>


</html>

var carrinho = []

var checkboxRetirarPedido = document.getElementById('checkbox-retirar-pedido'); //checkbox da entrega
var selectFormaPagamento = document.getElementById('dados-cliente-metodo-pagamento') //select da forma de pagamento
var selectPrecisaTroco = document.getElementById('dados-cliente-precisa-troco')
var divDadosClienteEndereco = document.getElementById('dados-cliente-endereco'); //div que tem os inputs do endereço
var inputTroco = document.getElementById('dados-cliente-valor-troco')

montarListaProdutos()





checkboxRetirarPedido.addEventListener('change', function() {

        if (checkboxRetirarPedido.checked) {

            divDadosClienteEndereco.style.display = 'none';

            document.getElementById('dados-cliente-rua').setAttribute('disabled','disabled')
            document.getElementById('dados-cliente-bairro').setAttribute('disabled','disabled')
            document.getElementById('dados-cliente-numero').setAttribute('disabled','disabled')
            document.getElementById('dados-cliente-complemento').setAttribute('disabled','disabled')
        } else {

            divDadosClienteEndereco.style.display = 'inherit';

            document.getElementById('dados-cliente-rua').removeAttribute('disabled','disabled')
            document.getElementById('dados-cliente-bairro').removeAttribute('disabled','disabled')
            document.getElementById('dados-cliente-numero').removeAttribute('disabled','disabled')
            document.getElementById('dados-cliente-complemento').removeAttribute('disabled','disabled')
        }
    });


		
//ATIVA E DESATIVA SPAM PARA TROCO

selectFormaPagamento.addEventListener('change', function() {

	divTroco = document.getElementById('divTroco')
        if (selectFormaPagamento.value == 'dinheiro') {
        	divTroco.style.display = 'inherit'
        } else {

            divTroco.style.display = 'none'
        }
    });


//ATIVA E DESATIVA O INPUT DO TROCO

selectPrecisaTroco.addEventListener('change', function() {

	

        if (selectPrecisaTroco.value == 'nao') {
        	inputTroco.setAttribute('disabled', 'disabled');
        } else {

            inputTroco.disabled = false;
        }
    });




function contador(operador,idContador,preco,idTotal){
	var contador = parseInt(document.getElementById(idContador).innerHTML)
	var valor = document.getElementById(preco).innerHTML

	switch (operador) {
		case '+': contador++
				  document.getElementById(idContador).innerHTML = contador
				  atualizarValor(parseFloat(valor),operador,idTotal);
				  break;

		case '-': if(contador != 1){
					contador--
					document.getElementById(idContador).innerHTML = contador
					atualizarValor(parseFloat(valor),operador,idTotal);
				  	break;
				  }
	}


	

}


function atualizarValor(valor,operador,idTotal){		

	var totalElement = document.getElementById(idTotal);


    var total = parseFloat(totalElement.innerHTML) || 0;

	switch (operador) {
        case '+':
            total += valor;
            break;

        case '-':
            if (total > 0) {
            	total -= valor;
            }
            break;
    }

    totalElement.innerHTML = total.toFixed(2);




}







//  		FUNÇOES PARA INSERIR NO MODAL PRODUTO CARDAPIO.PHP     //


function coletaDados(id){
	var nome_produto = document.getElementById('nome-produto-' + id).innerHTML
	var descricao_produto = document.getElementById('descricao-produto-' + id).innerHTML
	var preco_produto = document.getElementById('preco-produto-' + id).innerHTML
	var img_produto = document.getElementById('foto-produto-' + id).getAttribute('src');


	//titulo-modal = document.getElementById('titulo-modal').innerHTML
	//descricao-modal = document.getElementById('descricao-modal').innerHTML

	document.getElementById('foto-modal').setAttribute('src',img_produto)
	document.getElementById('titulo-modal').innerHTML = nome_produto
	document.getElementById('descricao-modal').innerHTML = descricao_produto
	document.getElementById('total-modal').innerHTML = preco_produto
	document.getElementById('contador-valor').innerHTML = 1
	document.getElementById('observacao-modal').value = ''
}



//   ADICIONAR PRODUTO AO CARRINHO   //



function adicionarCarrinho(){
	nome_produto = document.getElementById('titulo-modal').innerHTML
	observacao_produto = document.getElementById('observacao-modal').value
	preco_produto =document.getElementById('preco-produto').innerHTML
	quantidade = document.getElementById('contador-valor').innerHTML

	produto = [nome_produto,observacao_produto,preco_produto,quantidade]


	carrinho.push(produto)

	contadorCarrinho()

	console.log(carrinho);


}


function contadorCarrinho(){		//CONTA A QNTD DE PRODUTOS NO CARRINHO

	botaoElemento = document.getElementById('botao-carrinho')
	botaoElemento.removeAttribute('disabled')

	quantidadeCarrinho = document.getElementById('contador-carrinho').innerHTML

	elemento = document.getElementById('contador-carrinho')


	
	document.getElementById('contador-carrinho').innerHTML = carrinho.length

	elemento.style.display = "inherit"

	if(carrinho.length>0){
		botaoElemento.removeAttribute('disabled')
	} else {
		botaoElemento.setAttribute('disabled', 'disabled');
		elemento.style.display = "none"
	}



}



function adicionarProdutosAoModal() {
        // Limpar o conteúdo atual do modal-body
        var dynamicModalBody = document.getElementById('conteudo-modal-produtos');
        dynamicModalBody.innerHTML = '';
		valorTotal = 0
        // Iterar sobre os produtos e criar elementos para cada um
         carrinho.forEach(function(produto,index) {

         		var ID = index;

         		valorTotal += parseFloat(produto[2]) * produto[3]

         		console.log(valorTotal)

                // Criar elementos para o produto
                var divProduto = document.createElement('div');
                divProduto.className = 'row no-gutters align-items-center mb-5 shadow p-5';

                divProduto.innerHTML = `
                    <div class="col-2 text-center">
                        <p style="font-weight: bold;" class="carrinho-produto-titulo">${produto[0]}</p>
                    </div>
                    <div class="col-4">
                        <p class="carrinho-produto-descricao font-weight-light text-break">${produto[1]}</p>
                    </div>
                    <div class="col-2 text-center">
                        <span>R$</span>
                        <span id="carrinho-produto-preco" class="carrinho-produto-preco">${produto[2]}</span>
                    </div>
                    <div class="col-4 text-center">
                        <div class="d-flex flex-row align-items-center">
                            <button onclick="contador('-','contador-carrinho-valor-${ID}','carrinho-produto-preco','total-carrinho-valor')" style="gap: 6px;" class="btn btn-sm hover">-</button>
                            <h6 id="contador-carrinho-valor-${ID}" class="mt-2 mx-3 contador-valor">${produto[3]}</h6>
                            <button onclick="contador('+','contador-carrinho-valor-${ID}','carrinho-produto-preco','total-carrinho-valor')" class="btn btn-sm hover">+</button>

                            <button id="remover-produto" onclick="removerProduto(${index})") class="btn hover text-right ml-5"><i class="fa-solid fa-trash-can"></i></button>
                        </div>


                    </div>
                `;

                
                dynamicModalBody.appendChild(divProduto);
            });

         document.getElementById('total-carrinho-valor').innerHTML = valorTotal.toFixed(2)
    }


function removerProduto(indice){
	carrinho.splice(indice,1);

	adicionarProdutosAoModal()

	contadorCarrinho()
}

function alternaCarrinho(pagina){
	var modalProdutos = document.getElementById('conteudo-modal-produtos');
	var modalDadosCliente = document.getElementById('conteudo-modal-dados-cliente');
	var botaoProximo = document.getElementById('botao-carrinho-proximo');
	var botaoFinalizar = document.getElementById('botao-carrinho-finalizar');
	var botaoVoltar = document.getElementById('botao-carrinho-voltar');
	


	if (pagina == 2) {

		modalProdutos.style.display = 'none'
		modalDadosCliente.style.display = 'inherit'

		botaoProximo.style.display = 'none'
		botaoFinalizar.style.display = 'inherit'

		botaoVoltar.style.display = 'inherit'

	} else{
		modalProdutos.style.display = 'block'
		modalDadosCliente.style.display = 'none'

		botaoProximo.style.display = 'inherit'
		botaoFinalizar.style.display = 'none'

		botaoVoltar.style.display = 'none'
	}

}


function finalizarVenda(){
	var form = document.getElementById('formulario-dados-cliente')
	var rua = document.getElementById('dados-cliente-rua').value
    var bairro = document.getElementById('dados-cliente-bairro').value
    var numero = document.getElementById('dados-cliente-numero').value
    var nomeCliente = document.getElementById('dados-cliente-nome').value
    var formaPagamento = document.getElementById('dados-cliente-metodo-pagamento').value
    var carrinhoJSON = JSON.stringify(carrinho);
    var campoErroEndereco = document.getElementById('erro-endereco-campo')
    var campoErroNome = document.getElementById('erro-cliente-campo')
    var campoErroFormaPagamento = document.getElementById('erro-pagamento-campo')

    if(nomeCliente == ''){
    	campoErroNome.style.display ='inherit'   //verifica se existe nome
    	return
    }else{
    	campoErroNome.style.display ='none'
    }


    if(!checkboxRetirarPedido.checked && (rua == '' || bairro == '' || numero == '')){    //verifica dados endereços
    	var dadosEndereco = false
    	campoErroEndereco.style.display ='inherit'
    	valorErroEndereco.innerHTML = ''
    	return;

    } else{
		var dadosEndereco = true;
		campoErroEndereco.style.display ='none'
    }

    if(formaPagamento == ''){
    	campoErroFormaPagamento.style.display ='inherit'   //verifica se existe nome
    	return
    }else{
    	campoErroFormaPagamento.style.display ='none'
    }


		//se precisa troco = nao e tiver algum valor de troco informado
		// ele vai setar como disabled o input
	if (selectPrecisaTroco.value == 'nao' && inputTroco.value != ''){
		inputTroco.setAttribute('disabled,disabled')
	}

	document.getElementById('dados-carrinho-produtos').value = carrinhoJSON



	form.submit()
	
}


function montarListaProdutos() {

	divProdutos = document.getElementById('listaProdutosDinamicos')
	divProdutos.innerHTML = '';

	console.log(JsonProdutos)

	JsonProdutos.forEach(function(produto,index) {
		var linhaProduto = document.createElement('div');
		linhaProduto.className = 'row no-gutters align-items-center border-bottom p-2 hover'
		linhaProduto.id = produto.id;

		linhaProduto.setAttribute('data-toggle', 'modal');
    	linhaProduto.setAttribute('data-target', '#modal-dados-produto');


		linhaProduto.onclick = function(){
			coletaDados(produto.id)
		}



		linhaProduto.innerHTML = `
			<div class="col-2 ">
	          <img id="foto-produto-${produto.id}" height="80px;"  width="140px" src="${produto.img}" class="rounded" alt="" >
	        </div>

	        <div class="col-8 ">
	          <p id="nome-produto-${produto.id}" style="font-weight: bolder; margin-bottom:">${produto.nome}</p>
	          <p id="descricao-produto-${produto.id}" class="text-truncate">${produto.descricao}</p>
	        </div>

	        <div class="col-2 text-center p-2">
	          <span>R$ </span> 
	          <span id="preco-produto-${produto.id}">${produto.valor}</span>
	          <span style="display:none;" id="${produto.id}">99.99</span>
	        </div>
		`;

		divProdutos.appendChild(linhaProduto)
	})




}

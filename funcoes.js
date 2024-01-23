var carrinho = []



function contador(operador){
	var contador = parseInt(document.getElementById('contador-valor').innerHTML)
	var valor = document.getElementById('preco-produto').innerHTML

	switch (operador) {
		case '+': contador++
				  document.getElementById('contador-valor').innerHTML = contador
				  atualizarValor(parseFloat(valor),operador);
				  break;

		case '-': if(contador != 1){
					contador--
					document.getElementById('contador-valor').innerHTML = contador
					atualizarValor(parseFloat(valor),operador);
				  	break;
				  }
	}


	

}


function atualizarValor(valor,operador){

	var totalElement = document.getElementById('total-modal');


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


function coletaDados(){
	var nome_produto = document.getElementById('nome-produto').innerHTML
	var descricao_produto = document.getElementById('descricao-produto').innerHTML
	var preco_produto = document.getElementById('preco-produto').innerHTML
	//img_produto = document.getElementById('nome-produto').innerHTML


	//titulo-modal = document.getElementById('titulo-modal').innerHTML
	//descricao-modal = document.getElementById('descricao-modal').innerHTML


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
	preco_produto =document.getElementById('total-modal').innerHTML
	quantidade = document.getElementById('contador-valor').innerHTML

	produto = [nome_produto,observacao_produto,preco_produto,quantidade]


	carrinho.push(produto)

	contadorCarrinho()

	console.log(carrinho)

}


function contadorCarrinho(){		//CONTA A QNTD DE PRODUTOS NO CARRINHO

	botaoElemento = document.getElementById('botao-carrinho')
	botaoElemento.removeAttribute('disabled')

	quantidadeCarrinho = document.getElementById('contador-carrinho').innerHTML

	elemento = document.getElementById('contador-carrinho')


	
	document.getElementById('contador-carrinho').innerHTML = carrinho.length

	elemento.style.display = "inherit"

}



function adicionarProdutosAoModal() {
        // Limpar o conteúdo atual do modal-body
        var dynamicModalBody = document.getElementById('conteudo-modal');
        dynamicModalBody.innerHTML = '';
		valorTotal = 0
        // Iterar sobre os produtos e criar elementos para cada um
         carrinho.forEach(function(produto) {


         		valorTotal += parseFloat(produto[2])

         		console.log(valorTotal)

                // Criar elementos para o produto
                var divProduto = document.createElement('div');
                divProduto.className = 'row no-gutters align-items-center my-5 shadow p-5';

                divProduto.innerHTML = `
                    <div class="col-2 text-center">
                        <p style="font-weight: bold;" class="carrinho-produto-titulo">${produto[0]}</p>
                    </div>
                    <div class="col-4">
                        <p class="carrinho-produto-descricao font-weight-light text-break">${produto[1]}</p>
                    </div>
                    <div class="col-2 text-center">
                        <span>R$</span>
                        <span class="carrinho-produto-preco">${produto[2]}</span>
                    </div>
                    <div class="col-4 text-center">
                        <div class="d-flex flex-row align-items-center">
                            <button onclick="contador('-')" style="gap: 6px;" class="btn btn-sm">-</button>
                            <h6 class="mt-2 mx-3 contador-valor">${produto[3]}</h6>
                            <button onclick="contador('+')" class="btn btn-sm">+</button>

                            <button  class="btn hover text-right"><i class="fa-solid fa-trash-can"></i></button>
                        </div>


                    </div>
                `;

                // Adicionar o elemento do produto ao modal-body
                dynamicModalBody.appendChild(divProduto);
            });

         document.getElementById('total-carrinho-valor').innerHTML = valorTotal.toFixed(2)
    }

    document.getElementById('modal-carrinho').addEventListener('show.bs.modal', function () {
            adicionarProdutosAoModal();
        });
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







//  		FUNÇOES PARA INSERIR NO MODAL CARDAPIO.PHP     //


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

}



//   ADICIONAR PRODUTO AO CARRINHO   //



function adicionarCarrinho(){
	nome_produto = document.getElementById('titulo-modal').innerHTML
	descricao_produto = document.getElementById('descricao-modal').innerHTML 
	preco_produto =document.getElementById('total-modal').innerHTML
	quantidade = document.getElementById('contador-valor').innerHTML

	produto = [nome_produto,descricao_produto,preco_produto,quantidade]


	carrinho.push(produto)

	contadorCarrinho()

}


function contadorCarrinho(){		//CONTA A QNTD DE PRODUTOS NO CARRINHO

	botaoElemento = document.getElementById('botao-carrinho')
	botaoElemento.removeAttribute('disabled')

	quantidadeCarrinho = document.getElementById('contador-carrinho').innerHTML

	elemento = document.getElementById('contador-carrinho')


	
	document.getElementById('contador-carrinho').innerHTML = carrinho.length

	elemento.style.display = "inherit"

}

function carrinhoEnviar(){
	var carrinhoJSON = JSON.stringify(carrinho);

	document.getElementById('carrinho-produtos').value = carrinhoJSON

	document.getElementById("carrinhoForm").submit()
}
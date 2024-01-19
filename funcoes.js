


function contador(operador,id,valor){
	var contador = parseInt(document.getElementById('contador-valor-' + id).innerHTML)

	switch (operador) {
		case '+': contador++
				  document.getElementById('contador-valor-' + id).innerHTML = contador
				  break;

		case '-': if(contador > 0){
					contador--
					document.getElementById('contador-valor-' + id).innerHTML = contador
				  	break;
				  }
	}

	atualizarValor(parseFloat(valor),operador);
}


function atualizarValor(valor,operador){
	var totalElement = document.getElementById('total-compra');
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

function adicionarCarrinho(){
	var produtos = document.querySelectorAll('.produtos')

	console.log(produtos)

	produtos.forEach(function(produto) {
        // Obtenha o ID do produto e a quantidade
        var produtoId = produto.id;
        var quantidade = document.getElementById('contador-valor').innerHTML

        console.log(quantidade);


}




//  		FUNÇOES PARA INSERIR NO MODAL CARDAPIO.PHP     //


function coletaDados
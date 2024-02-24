function recuperarDados(){
	ajax = new XMLHttpRequest();

	ajax.open('GET',"cadprodu_services.php?metodo=recuperar&campo=*&tabela=produtos")

	ajax.onload = function() {
	    if (ajax.status >= 200 && ajax.status < 300) {
	        if (ajax.responseText.trim() !== '') { // Verifica se a resposta não está vazia
                var response = JSON.parse(ajax.responseText);
                callback(response); // Chama a função de callback com os dados recebidos
            } else {
                console.error('Dados vazios recebidos');
            }
	    } else {
	        return false;
	    }
	};
	ajax.onerror = function() {
	    return false;
	};
	ajax.send();
}










function montarListaProdutos($container){
	if(recuperarDados() != false){
		divDinamica = document.getElementById($container);
	divDinamica.innerHTML = '';

	}

	



}


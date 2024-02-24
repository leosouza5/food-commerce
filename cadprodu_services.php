<?php 

	require_once "conexao.php";

	$cadprodu_services = new ProdutoService();

 
		if (isset($_GET['metodo']) && method_exists($cadprodu_services, $_GET['metodo'])) {

			$campo = isset($_GET['campo']) ? $_GET['campo'] : null;
			$tabela = isset($_GET['tabela']) ? $_GET['tabela'] : null;
			$where = isset($_GET['where']) ? $_GET['where'] : null;
			$order = isset($_GET['order']) ? $_GET['order'] : null;

		    $cadprodu_services->{$_GET['metodo']}($campo,$tabela,$where,$order);


		} else {
		    echo "Método não encontrado!";
		}
	

	Class ProdutoService {

		public function __construct() {
			$this->conexao = (new Conexao())->conectar();
		}


		


		public function inserir($nome,$valor,$desc,$imagem) {
			if(Empty(trim($imagem))){
				$imagem = 'imagens/sem-foto.png';
			}

			try {

				
				$conexao = new Conexao();
				$pdo = $conexao->conectar();



				$sql = "INSERT INTO produtos (nome, valor, descricao, img) VALUES (:nome, :valor, :descricao, :imagem)";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':nome', $nome);
				$stmt->bindParam(':valor', $valor);
				$stmt->bindParam(':descricao', $desc);
				$stmt->bindParam(':imagem', $imagem);


				if($stmt->execute()){
				     header("Location: cadprodu.php?success=S");
				}else{
				    header("Location: cadprodu.php?success=N");
				    print_r($stmt->errorInfo());
				}

				
			} catch (PDOException $e) {
				return $e;
			}

		}


		public function recuperar($campos,$tabela,$where,$order){
			try {

				
				$conexao = new Conexao();
				$pdo = $conexao->conectar();



				$sql = "SELECT $campos FROM $tabela";

				if(!empty($where)){
					$sql .= "WHERE $where";
				}

				if (!empty($orderby)) {
		            $sql .= " ORDER BY $order";
		        }


				$stmt = $pdo->prepare($sql);
				#$stmt->bindParam(':campo', $campo);
				#$stmt->bindParam(':id', $id);
				
				if($stmt->execute()){

				     $resultados = json_encode($stmt->fetchALL(PDO::FETCH_ASSOC));
				     return $resultados;

				}else{
				    header("Location: cardapio.php?success=N");
				    
				    print_r($stmt->errorInfo());
				}

				
			} catch (PDOException $e) {
				return $e;
			}
		}

		public function atualizar(){

		}

		public function remover(){

		}
	}



?>
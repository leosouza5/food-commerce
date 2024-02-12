<?php 

	require_once "../../projeto/conexao.php";
 

	

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


		public function recuperar(){
			try {

				
				$conexao = new Conexao();
				$pdo = $conexao->conectar();



				$sql = "SELECT * FROM produtos ORDER BY categoria,nome";
				$stmt = $pdo->prepare($sql);
				#$stmt->bindParam(':campo', $campo);
				#$stmt->bindParam(':id', $id);
				
				if($stmt->execute()){

				     $resultados = $stmt->fetchALL(PDO::FETCH_ASSOC);
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
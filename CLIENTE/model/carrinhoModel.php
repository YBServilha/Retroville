        <?php

        class Carrinho{
            private $codUsuario;
            private $codProduto;
            private $imgCard;
            private $marca;
            private $modelo;
            private $carroceria;
            private $preco;
            private $motor;
            private $cor;
            private $km;
            private $ano;

            public function __construct($codUsuario, $codProduto, $imgCard, $marca, $modelo, $carroceria, $preco, $motor, $cor, $km, $ano) {
                $this->codUsuario = $codUsuario;
                $this->codProduto = $codProduto;
                $this->imgCard = $imgCard;
                $this->marca = $marca;
                $this->modelo = $modelo;
                $this->carroceria = $carroceria;
                $this->preco = $preco;
                $this->motor = $motor;
                $this->cor = $cor;
                $this->km = $km;
                $this->ano = $ano;
            }

            function adicionar(){
                include_once '../../ADM/model/Conexao.php';
            
                // Verifique se o produto já está no carrinho
                $verificarSql = "SELECT id FROM carrinho WHERE cod_usuario = '$this->codUsuario' AND cod_produto = '$this->codProduto'";
                $conn = new Conexao();
                $resultado = $conn->consultarDados($verificarSql);
            
                if (count($resultado) == 0) {
                    // O produto não está no carrinho, então podemos adicioná-lo
                    $sql = "INSERT INTO carrinho (cod_usuario, cod_produto, imgCard, marca, modelo, carroceria, preco, motor, cor, km, ano) VALUES ('$this->codUsuario', '$this->codProduto', '$this->imgCard', '$this->marca', '$this->modelo', '$this->carroceria', '$this->preco', '$this->motor', '$this->cor', '$this->km', '$this->ano')";
                    $conn->executar($sql);
                } else {
                    // O produto já está no carrinho, você pode lidar com isso da maneira que preferir (por exemplo, exibir uma mensagem de erro).
                    // Aqui, simplesmente retornaremos false para indicar que a adição falhou.
                    return false;
                }
            }
            
            

            function listarCarrinho($sql) {
                include_once '../../ADM/model/Conexao.php';
                $conn = new Conexao();
                return $conn->consultarDados($sql);
            }
        }


        ?>
    <?php
    session_start();
    if(isset($_SESSION['EMAIL'])){
     //ECHO 'TUDO CERTO';
    }if(isset($_GET['code'])){
     //DESLOGANDO
     session_destroy();
     header('Location: ../../index.php');
    }elseif(!isset($_SESSION['EMAIL'])){
     //DESLOGADO
     header('Location: ../../index.php');
    }
    include_once '../../ADM/model/Conexao.php';
    include_once '../model/carrinhoModel.php';

    $produtosNoCarrinho = array(); // Array para armazenar produtos no carrinho

    if (isset($_GET['cod'])) {
        $codProduto = $_GET['cod'];
        
        // Consultar os detalhes do produto com base no código
        $conn = new Conexao();
        $sql = "SELECT * FROM produtos WHERE cod = '$codProduto'";
        $resultados = $conn->consultarDados($sql);

        $usuario = $_SESSION['CPF'];
        //var_dump($usuario);

        
        foreach ($resultados as $resultado) {
            $carrinho = new Carrinho($usuario, $resultado['cod'], $resultado['imgCard'], $resultado['marca'], $resultado['modelo'], $resultado['carroceria'], $resultado['preco'], $resultado['motor'], $resultado['cor'], $resultado['km'], $resultado['ano']);

            $carrinho->adicionar();
            
            // Consultar o carrinho
            $sqlCarrinho = "SELECT * FROM carrinho WHERE cod_usuario = '$usuario'";
            $resultadoCarrinho = $carrinho->listarCarrinho($sqlCarrinho);
            
            // Adicionar os produtos ao array
            foreach ($resultadoCarrinho as $res) {
                $produtosNoCarrinho[] = $res;
            }
        }
        //var_dump($sqlCarrinho);
        //exit();
    } else {
        if(isset($_GET['itemDeletado'])){
        ?>
        <script>
            alert("Produto excluído do carrinho!");
            location.href = "produtos.php";
        </script>
        <?php
        }else{
        ?>
        <script>
            alert("Nenhum produto foi selecionado para acessar esta página! Você será redirecionado ao nosso catálogo de veículos!");
            location.href = "produtos.php";
        </script>
    <?php
        }
    }
    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrinho - Retroville</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/carrinho.css">
        
    </head>
    <body>
        <header>
            <div id="logo">
                <img src="img/imgHome/logo.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <a href="CLIENTE/view/produtos.html"><li>Veículos</li></a>
                    <a href="#"><li>Sobre</li></a>
                    <a href="#"><li>Contato</li></a>
                </ul>
            </nav>
            <div class="icons">
                <a href="logSigin.html"><ion-icon name="person-outline"></ion-icon></a>
                <a href="carrinho.html"><ion-icon name="car-sport-outline"></ion-icon></a>
                <?php 
                    if(isset($_SESSION['EMAIL'])){
                        //USUARIO LOGADO
                        echo '<button id="logout" onclick="logout();">Sair</button>';
                    }else{
                        //USUÁRIO DESLOGADO
                        echo '<button id="logout" onclick="sigin();">Entrar</button>';
                    }
                ?>
            </div>
            <div class="menuResponsivoIcon">
                <ion-icon name="menu-outline" id="iconResponsivo"></ion-icon>
            </div>
            <div class="menuResponsivo display">
                <div class="principalResponsivo">
                    <div class="headerResponsivo">
                        <img src="img/imgHome/logo.png" alt="Logo">
                    </div>
                    <div class="itensResponsivo">
                        <ul>
                            <a href="#"><li>Veículos</li></a>
                            <a href="#"><li>Sobre</li></a>
                            <a href="#"><li>Contato</li></a>
                            <a href="logSigin.html"><ion-icon name="person-outline"></ion-icon></a>
                            <a href="carrinho.html"><ion-icon name="car-sport-outline"></ion-icon></a>
                        </ul>
                    </div>
                </div>
            </div>
        </header>



    <!-- Carrinho de compras1 -->

    <h1>Meu carrinho</h1>

    <section class="carrinho">
    <div class="informacoes-produto">
        <?php
        foreach ($produtosNoCarrinho as $produtoNoCarrinho) {
            $pasta = $produtoNoCarrinho['modelo'].'_'.$produtoNoCarrinho['cod_produto'].'/'.$produtoNoCarrinho['imgCard'];
            ?>
            <div class="produto">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?>" alt="Imagem produto carrinho">
                <div class="desc-produto">
                    <h2 class="rubik"><?php echo $produtoNoCarrinho['marca'].' - '.$produtoNoCarrinho['modelo'];?></h2>
                    <p>Infos: <br>Carroceria: <?php echo $produtoNoCarrinho['carroceria']?>;<br>KM: <?php echo $produtoNoCarrinho['km']?>;<br>Cor: <?php echo $produtoNoCarrinho['cor']?>;<br> Motor: <?php echo $produtoNoCarrinho['motor']?>.</p>
                </div>
                <p class="preco-carrinho">Preço: R$ <?php echo number_format($produtoNoCarrinho['preco'], 2); ?></p>
                <form action="../controller/carrinhoController.php" method="post" id="formCarrinho" name="formDelete">
                <ion-icon name="trash-outline" id="excluirProdutoCarrinho"></ion-icon>
                <input type="hidden" name="codUsuario" value="<?php echo $usuario;?>">
                <input type="hidden" name="codProduto" value="<?php echo $produtoNoCarrinho['cod_produto'];?>">
                <input type="hidden" name="formExcluir">
                </form>
            </div>

    </div>
        <div class="resumo-pedido">
            <h2>Resumo do pedido</h2>

            <div class="sub-total">
                <div id="sub-total">
                    <p>Subtotal</p>
                    <p>R$ <?php echo number_format($produtoNoCarrinho['preco'], 2); ?></p>
                </div>
                <div id="frete">
                    <p>Frete</p>
                    <p>Grátis</p>
                </div>
            </div>
            <div class="total">
                <div id="total">
                    <p>Total</p>
                    <p>R$ <?php echo number_format($produtoNoCarrinho['preco'], 2); ?></p>
                </div>
                <?php
                }
                ?>
                <a href="produtos.php" id="linkProdutos"><button type="button" class="btn btn-outline-warning btn-lg btn-block">Adicionar outro produto</button></a>
                <button type="button" class="btn btn-outline-success btn-lg btn-block">Comprar</button>
            </div>
        </div>
    </section>




    <!-- FIM Carrinho de compras1 -->

        <script>
            function logout() {
                // Redirecionar para a página de logout
                window.location.href = "../../index.php?code=1"; 
            }

            function sigin() {
                //Redirecionar para login e sigin
                window.location.href = "logSigin.php";
            }
        </script>

        <script>
            let btn = document.querySelector('.menuResponsivoIcon');
            let menuMobile = document.querySelector('.menuResponsivo');
            var width = document.documentElement.clientWidth;
            var iconResponsivo = document.getElementById('iconResponsivo');

            btn.addEventListener('click', () => {
                menuMobile.classList.toggle('display');
                iconResponsivo.classList.toggle('white');
            });
            

        </script>

        <script>
            let deleteButton = document.getElementById('excluirProdutoCarrinho');
            let formDelete = document.getElementById('formCarrinho');

            deleteButton.addEventListener('click', () => {
                formDelete.submit();
            });
        </script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    </html>
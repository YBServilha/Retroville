<?php
session_start();
include_once '../../ADM/model/Conexao.php';

if (isset($_GET['cod'])) {
    $codProduto = $_GET['cod'];
    
    // Consultar os detalhes do produto com base no código
    $conn = new Conexao();
    $sql = "SELECT * FROM produtos WHERE cod = '$codProduto'";
    $resultados = $conn->consultarDados($sql);
  }else{
    ?>
    <script>
        alert("Produto não selecionado para acessar esta página! Você será redirecionado ao nosso catálogo de veículos!");
        location.href = "produtos.php";
    </script>
    <?php
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - Retroville</title>
    <link rel="stylesheet" href="css/produtoStyle.css">
</head>
<body>
    <header>
        <div id="logo">
            <a href="../../index.php">
                <img src="img/imgHome/logo.png" alt="Logo">
            </a>
        </div>
        <nav>
            <ul>
                <a href="produtos.php"><li>Veículos</li></a>
                <a href="sobre.php"><li>Sobre</li></a>
                <a href="contato.php"><li>Contato</li></a>
            </ul>
        </nav>
        <div class="icons">
            <a href="dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
            <a href="carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
            <?php 
                if(isset($_SESSION['EMAIL_USER'])){
                    //USUARIO LOGADO
                    echo '<button id="logout" onclick="logout();">Sair</button>';
                }else{
                    //TOTALMENTE TESTE
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
                        <a href="produtos.php"><li>Veículos</li></a>
                        <a href="sobre.php"><li>Sobre</li></a>
                        <a href="contato.php"><li>Contato</li></a>
                        <a href="dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main id="sectionProduto">
    <?php
      foreach($resultados as $resultado){
        $pasta = $resultado['modelo'].'_'.$resultado['cod'].'/';

      ?>
        <section id="sectionPrincipal" style="background-image: url(../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['imgCapa']?>)">
        <h2 class="text-light"><?php echo $resultado['marca'].' '.$resultado['modelo'];?></h2>
        <a href="carrinho.php?cod=<?php echo $resultado['cod']; ?>">Comprar</a>
        </section>

        <section id="sectionHistoria" style="background-image: url(../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['imgHistoria']?>)">
            <div class="tituloHistoria">
                <h1>UMA HISTÓRIA CLÁSSICA</h1>
            </div>
            <div class="textoHistoria">
                <p><?php echo $resultado['textoCarro']?></p>
            </div>

        </section>
        <section class="modelo">
            <h2><span id="ano"><?php echo $resultado['ano']?></span> - <?php echo $resultado['marca'].' '.$resultado['modelo']?></h2>
        </section>
        <section class="especificacoes">
            <div class="categoria">
                <div class="titulo">
                    <p>Marca</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['marca']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Modelo</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['modelo']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Ano</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['ano']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Motor</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['motor']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Carroceria</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['carroceria']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>KM</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['km']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Cor</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['cor']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Câmbio</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['cambio']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Final da placa</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['finalPlaca']?></p>
                </div>
            </div>
            <div class="categoria">
                <div class="titulo">
                    <p>Valor</p>
                </div>
                <div class="resultado">
                    <p><?php echo $resultado['preco']?></p>
                </div>
            </div>
        </section>
        <section class="mosaicoFotos">
            <div class="foto" id="foto1">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img1']?>" alt="foto1">
            </div>
            <div class="foto" id="foto2">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img2']?>" alt="foto2">
            </div>
            <div class="foto" id="foto3">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img3']?>" alt="foto3">
            </div>
            <div class="foto" id="foto4">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img4']?>" alt="foto4">
            </div>
            <div class="foto" id="foto5">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img5']?>" alt="foto5">
            </div>
            <div class="foto" id="foto6">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img6']?>" alt="foto6">
            </div>
            <div class="foto" id="foto7">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img7']?>" alt="foto7">
            </div>
            <div class="foto" id="foto8">
                <img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['img8']?>" alt="foto8">
            </div>
        </section>
    </main>
    <?php
      }
    ?>


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
    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
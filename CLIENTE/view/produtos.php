<?php
include_once '../../ADM/model/Conexao.php';

$conn = new Conexao();

$sql = "SELECT * FROM produtos";
$resultados = $conn->consultarDados($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/produtosStyle.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>

    <!--CABEÇALHO HEADER-->
    <header>
        <div id="logo">
            <a href="../../index.php">
                <img src="CLIENTE/view/img/imgHome/logo.png" alt="Logo">
            </a>
        </div>
        <nav>
            <ul>
                <a href="produtos.php"><li>Veículos</li></a>
                <a href="#"><li>Sobre</li></a>
                <a href="#"><li>Contato</li></a>
            </ul>
        </nav>
        <div class="icons">
            <a href="dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
            <a href="carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
        </div>
        <div class="menuResponsivoIcon">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="menuResponsivo display">
            <div class="principalResponsivo">
                <div class="headerResponsivo">
                    <img src="img/imgHome/logo.png" alt="Logo">
                </div>
                <div class="itensResponsivo">
                    <ul>
                        <a href="produtos.php"><li>Veículos</li></a>
                        <a href="#"><li>Sobre</li></a>
                        <a href="#"><li>Contato</li></a>
                        <a href="dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!--TÍTULO DE PRODUTOS E BARRA DE PESQUISA E ÍCONES-->
    <h1>Veículos Clássicos</h1>
    <form action="" method="" class="form-pesquisa">
        <i class="fa-solid fa-magnifying-glass"></i><input type="text" name="pesquisa" class="pesquisa">
    </form>

    <div class="box-icons-car">
        <div class="icones">
            <a href="#" class="link-icon-car">
                <img src="img/imgIcones/1.png" alt="" class="icon-car">
                <p>conservadores</p>
            </a>
            <a href="#" class="link-icon-car">
                <img src="img/imgIcones/2.png" alt="" class="icon-car">
                <p>sedans</p>
            </a>
            <a href="#" class="link-icon-car">
                <img src="img/imgIcones/3.png" alt="" class="icon-car">
                <p>esportivos</p>
            </a>
            <a href="#" class="link-icon-car">
                <img src="img/imgIcones/4.png" alt="" class="icon-car">
                <p>SUV</p>
            </a>
            <a href="#" class="link-icon-car">
                <img src="img/imgIcones/5.png" alt="" class="icon-car">
                <p>caminhonetes</p>
            </a>
        </div>
    </div>


    <!--BOX DE PRODUTOS-->
    <div class="box-products">
    <?php
        foreach($resultados as $resultado){
            $pasta = $resultado['modelo'].'_'.$resultado['cod'].'/';
            
    ?>  
        <div class="item-products"><a href="produto.php?cod=<?php echo $resultado['cod']; ?>"><div class="box-div-img"><span id="carroceria"><?php echo $resultado['carroceria']?></span><img src="../../ADM/view/img/imgProdutos/<?php echo $pasta;?><?php echo $resultado['imgCard']?>" alt="" class="item-products-img"></div><p><?php echo $resultado['marca']?> <?php echo $resultado['modelo']?></p></a></div>
        <?php
        }
        ?>
    </div>


    <!--RODAPÉ FOOTER-->
    <footer>
        <div id="box-footer">
            <div class="box-item-footer">
                <img src="img/imgHome/logo.png" alt="Logo" class="logo">
            </div>

            <div class="box-item-footer p-1">
                <p class="p-1">Direitos Autorais - ©</p>
            </div>

            <div class="box-item-footer">
                <div class="box-icons">
                    <p class="p-redes-sociais">Redes Sociais:</p>
                    <div class="iii">
                        <a href="#" class="link-redes">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="link-redes">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="#" class="link-redes">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--JAVASCRIPT DO MENU-->
    <script>
        let btn = document.querySelector('.menuResponsivoIcon');
        let menuMobile = document.querySelector('.menuResponsivo');
        var width = document.documentElement.clientWidth;

        btn.addEventListener('click', () => {
            menuMobile.classList.toggle('display');
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
    session_start();
    include_once ('../../ADM/model/Conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/sobreStyle.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>

    <!--CABEÇALHO HEADER-->
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
                        <a href="sobre.php"><li>Sobre</li></a>
                        <a href="contato.php"><li>Contato</li></a>
                        <a href="dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!--TÍTULO E INFORMAÇÕES DE SOBRE NÓS-->
    <h1>Sobre Nós</h1>
    <div class="box-text">
        <p>
            Bem-vindo ao nosso site de curadoria de carros antigos! Nós somos um grupo de estudantes da ETEC Jornalista Roberto Marinho, e este projeto faz parte do nosso trabalho de conclusão de curso.
        </p>

        <p>
            Nosso objetivo é proporcionar uma 
            experiência única para entusiastas de carros antigos, oferecendo uma seleção cuidadosa de veículos clássicos à venda. Valorizamos a qualidade, autenticidade e história por trás de cada carro que disponibilizamos em nosso site.
        </p>

        <p>
            Além da venda de carros antigos, também fornecemos informações detalhadas sobre cada modelo, incluindo especificações técnicas e curiosidades. Acreditamos que é fundamental inspirar nossos clientes, ajudando-os a tomar decisões e a encontrar o carro clássico dos seus sonhos.
        </p>
    </div>

    <h1>Integrantes</h1>
    <div class="box-fotos">
        <div class="fotos">
            <img src="img/imgSobreNos/f1.png" alt="">
            <p class="nomes">Brunno Silva Steagall</p>
            <p class="funcao">Gestor de Conteúdo</p>
        </div>
        <div class="fotos">
            <img src="img/imgSobreNos/f2.png" alt="">
            <p class="nomes">Yan  Barbosa Servilha</p>
            <p class="funcao">Desenvolvedor de Software</p>
        </div>
        <div class="fotos">
            <img src="img/imgSobreNos/f3.png" alt="">
            <p class="nomes">Enzo Lemos Menon</p>
            <p class="funcao">Designer / UX</p>
        </div>
        <div class="fotos">
            <img src="img/imgSobreNos/f4.png" alt="">
            <p class="nomes">Jorge Liotino Rodrigues</p>
            <p class="funcao">Designer / UX</p>
        </div>
        <div class="fotos">
            <img src="img/imgSobreNos/f5.png" alt="">
            <p class="nomes">Danilo dos Santos Almeida</p>
            <p class="funcao">Desenvolvedor de Software</p>
        </div>
        
        <div class="fotos">
            <img src="img/imgSobreNos/f6.jpeg" alt="">
            <p class="nomes">Rafael Henrique Loureiro </p>
            <p class="funcao">Documentador</p>
        </div>
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
                        <a href="https://www.instagram.com/retroville_rv/" class="link-redes">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=5511984008296" class="link-redes">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="https://www.tiktok.com/@retroville_rv" class="link-redes">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!--JAVASCRIPT DO MENU-->
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

        btn.addEventListener('click', () => {
            menuMobile.classList.toggle('display');
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
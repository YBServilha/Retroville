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

    <h1 id="integrantes">Integrantes</h1>
    <div class="container">
        <span data-tilt>
        <div class="box" style="--i:0;">
        <i></i>
        <div class="content">
            <img src="img/imgSobreNos/f2.png" alt="">
            <h2>Yan Servilha<br><span>Lead & Desenvolvedor</span></h2>
            <a href="https://www.linkedin.com/in/yan-barbosa-servilha" target="_blank">Contato</a>
        </div>
        </div>
    </span>
        <div class="box" style="--i:0;">
            <i></i>
            <div class="content">
                <img src="img/imgSobreNos/f1.png" alt="">
                <h2>Brunno Silva<br><span>Social Media</span></h2>
                <a href="https://www.linkedin.com/in/brunno-steagall-770a951b0/" target="_blank">Contato</a>
            </div>
            </div>
            <div class="box" style="--i:0;">
                <i></i>
                <div class="content">
                    <img src="img/imgSobreNos/f5.png" alt="">
                    <h2>Danilo dos Santos<br><span>Desenvolvedor</span></h2>
                    <a href="https://www.linkedin.com/in/danilo-almeida-7a0994269/" target="_blank">Contato</a>
                </div>
                </div>
                <div class="box" style="--i:0;">
                    <i></i>
                    <div class="content">
                        <img src="img/imgSobreNos/f3.png" alt="">
                        <h2>Enzo Lemos<br><span>Designer/UX</span></h2>
                        <a href="https://www.linkedin.com/in/enzo-l-b9a881208/" target="_blank">Contato</a>
                    </div>
                    </div>
                    <div class="box" style="--i:0;">
                        <i></i>
                        <div class="content">
                            <img src="img/imgSobreNos/f4.png" alt="">
                            <h2>Jorge Liotino<br><span>Designer/UX</span></h2>
                            <a href="https://www.linkedin.com/in/jorge-liotino-2aa6b9267/" target="_blank">Contato</a>
                        </div>
                        </div>
                        <div class="box" style="--i:0;">
                            <i></i>
                            <div class="content">
                                <img src="img/imgSobreNos/f6.jpeg" alt="">
                                <h2>Rafael Henrique<br><span>Documentador</span></h2>
                                <a href="#">Contato</a>
                            </div>
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
                        <a href="https://api.whatsapp.com/send?phone=5511998949584" target="_blank" class="link-redes">
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

<script type="text/javascript" src="vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelector(".box"), {
            max: 25,
            speed: 400
        });
        
        //It also supports NodeList
        VanillaTilt.init(document.querySelectorAll(".box"));
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
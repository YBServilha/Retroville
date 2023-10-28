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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/mudarSenha.css" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>
    <!--HEADER DO SITE-->
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



    <!--TÍTULO DE USUÁRIOS E IMG DE FUNDO-->
    <div class="box-all">
        <div class="box-info">
            <h1>Mudar senha:</h1>
            <!--<div class="box-p">
                <p>Nome: Danilo dos Santos Almeida</p>
                <p>Email: dan@gmail.com</p>
                <p>CPF: 094.095.04-70</p>
                <p>Senha: Mdjhs</p>
            </div>-->
            <div class="forms">
                <form action="../controller/confirmarSenha.php" method="POST">
                    <input type="text" name="senha" placeholder="Senha atual...">
                    <input type="text" name="nova_senha" placeholder="Nova senha...">
                    <input type="submit" name="editar" value="Atualizar" class="btn edit">
                </form>
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
                        <a href="" class="link-redes">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="" class="link-redes">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="" class="link-redes">
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
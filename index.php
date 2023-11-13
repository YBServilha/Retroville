<?php 
   session_start();
   if(isset($_SESSION['EMAIL_USER'])){
    //ECHO 'TUDO CERTO';
   }if(isset($_GET['code'])){
    //DESLOGANDO
    session_destroy();
    header('Location: index.php');
   }if(isset($_GET['desconectar'])){
    //DESLOGANDO
    session_destroy();
    header('Location: index.php');
   }else{
    //DESLOGADO
   } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Retroville</title>
    <link rel="stylesheet" href="CLIENTE/view/css/indexStyle.css">
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.php">
                <img src="CLIENTE/view/img/imgHome/logo.png" alt="Logo">
            </a>
        </div>
        <nav>
            <ul>
                <a href="CLIENTE/view/produtos.php"><li>Veículos</li></a>
                <a href="#"><li>Sobre</li></a>
                <a href="#"><li>Contato</li></a>
            </ul>
        </nav>
        <div class="icons">
            <a href="CLIENTE/view/dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
            <a href="CLIENTE/view/carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
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
                    <img src="CLIENTE/view/img/imgHome/logo.png" alt="Logo">
                </div>
                <div class="itensResponsivo">
                    <ul>
                        <a href="#"><li>Veículos</li></a>
                        <a href="#"><li>Sobre</li></a>
                        <a href="#"><li>Contato</li></a>
                        <a href="CLIENTE/view/dadosUsuario.php"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="CLIENTE/view/carrinho.php?res=1"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="background1">
            <!--<p>Esportivos</p>-->
            <p>Esportivos</p>
            <a href="CLIENTE/view/produtos.php">Ver todos os veículos</a>
        </section>
        <section class="background1">
            <p>Esportivos</p>
            <a href="CLIENTE/view/produtos.php">Ver todos os esportivos</a>
        </section>
        <section class="background1">
            <p>Esportivos</p>
            <a href="CLIENTE/view/produtos.php">Ver todos os esportivos</a>
        </section>
    </main>

    <?php
        if(isset($_GET['msg_sucesso'])){
    ?>
        <script>
            alert("Login feito com sucesso!");
        </script>
         
    <?php 
        }if(isset($_GET['msg_excluir'])){
    ?>
        <script>
            alert("Conta excluída com sucesso!");
        </script>
         
    <?php 
        }
    ?>

    <script>
        function logout() {
            // Redirecionar para a página de logout
            window.location.href = "index.php?code=1"; 
        }

        function sigin() {
            //Redirecionar para login e sigin
            window.location.href = "CLIENTE/view/logSigin.php";
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
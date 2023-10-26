<?php 
   session_start();
   if(isset($_SESSION['EMAIL'])){
       //ECHO 'TUDO CERTO';
      
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
            <img src="CLIENTE/view/img/imgHome/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <a href="CLIENTE/view/produtos.html"><li>Veículos</li></a>
                <a href="#"><li>Sobre</li></a>
                <a href="#"><li>Contato</li></a>
            </ul>
        </nav>
        <div class="icons">
            <a href="CLIENTE/view/logSigin.html"><ion-icon name="person-outline"></ion-icon></a>
            <a href="CLIENTE/view/carrinho.html"><ion-icon name="car-sport-outline"></ion-icon></a>
            <button id="logout" onclick="logout();">Logout</button>
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
                        <a href="CLIENTE/view/logSigin.html"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="CLIENTE/view/carrinho.html"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="background1">
            <?php 
                 if(isset($_SESSION['EMAIL'])){
                    //DESLOGAR USUARIO
                    session_destroy();
                    echo '<p>' . $_SESSION['EMAIL'] . '</p>';
                }else{
                    //TOTALMENTE TESTE
                    echo '<p>Esportivos</p>';
                }
            ?>
            <!--<p>Esportivos</p>-->
            <a href="#">Ver todos os veículos</a>
        </section>
        <section class="background1">
            <p>Esportivos</p>
            <a href="#">Ver todos os esportivos</a>
        </section>
        <section class="background1">
            <p>Esportivos</p>
            <a href="#">Ver todos os esportivos</a>
        </section>
    </main>

    <script>
        function logout() {
            // Redirecionar para a página de logout
            window.location.href = "index.php?code=1"; 
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
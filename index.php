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
            <a href="#"><ion-icon name="person-outline"></ion-icon></a>
            <a href="CLIENTE/view/carrinho.html"><ion-icon name="car-sport-outline"></ion-icon></a>
        </div>
        <div class="menuResponsivoIcon">
            <ion-icon name="menu-outline"></ion-icon>
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
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="background1">
            <p>Esportivos</p>
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

    <footer>
        <p>asfklçjsqdklçfjlkasdf</p>
        <p>asdfasdf</p>
        <p>asdfasdfasdfsdf</p>
    </footer>





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
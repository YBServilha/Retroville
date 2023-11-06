<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn e SigIn - Retroville</title>
    <link rel="stylesheet" href="css/logSiginStyle.css">
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/imgHome/logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <a href="produtos.php"><li>Veículos</li></a>
                <a href="#"><li>Sobre</li></a>
                <a href="#"><li>Contato</li></a>
            </ul>
        </nav>
        <div class="icons">
            <a href="logSigin.php"><ion-icon name="person-outline"></ion-icon></a>
            <a href="carrinho.php"><ion-icon name="car-sport-outline"></ion-icon></a>
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
                        <a href="produtos.php"><li>Veículos</li></a>
                        <a href="#"><li>Sobre</li></a>
                        <a href="#"><li>Contato</li></a>
                        <a href="logSigin.php"><ion-icon name="person-outline"></ion-icon></a>
                        <a href="carrinho.php"><ion-icon name="car-sport-outline"></ion-icon></a>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section id="section">
        <div class="boxLogin">
            <div class="sigIn">
                <div class="imgFundo1" id="imgSigIn"></div>
                <h2>Cadastrar</h2>
                <div class="btn" id="btn">
                    <div class="transicao"></div>
                    <div>Cadastro</div>
                    <div>Entrar</div>
                </div>
                <form action="../controller/siginController.php" method="post">
                    <label for="nome">Nome: </label>
                    <input type="text" name="nome" id="nome" required>
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" required>
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" id="senha" required>
                    <label for="cpf">CPF: </label>
                    <input type="text" name="cpf" id="cpfInput" maxlength="14" required>
                    <input type="submit" value="Cadastrar" id="btnCadastrar">
                </form>
            </div>
            <div class="logIn">
                <div class="imgFundo1" id="imgLogIn"></div>
                    <h2>Entrar</h2>
                    <div class="btn" id="btn2">
                        <div class="transicao"></div>
                        <div>SigIn</div>
                        <div>LogIn</div>
                    </div>
                    <form action="../controller/loginController.php" method="post">
                        <label for="email">E-mail: </label>
                        <input type="email" name="email" id="email">
                        <label for="senha">Senha: </label>
                        <input type="password" name="senha" id="senha">
                        <input type="submit" value="Entrar" id="btnEntrar">
                    </form>
            </div>
        </div>
    </section>


    <script>
        var btn = document.getElementById('btn');
        var btnLogIn = document.getElementById('btn2'); // Use 'btn2' para selecionar o botão de LogIn
        var transicao = document.querySelector('.transicao');
        var imgSigIn = document.getElementById('imgSigIn');
        var imgLogIn = document.getElementById('imgLogIn');
        var formSigIn = document.getElementById('formSigIn');
        var formLogIn = document.getElementById('formLogIn');
        
        btn.addEventListener('click', () => {
            transicao.style.left = "50%";
            transicao.style.right = "0"; 
        
            
            imgSigIn.style.transition = "opacity 2s";
            imgSigIn.style.opacity = "1";
            imgSigIn.style.zIndex = "1";
            imgLogIn.style.transition = "opacity 2s";
            imgLogIn.style.opacity = "0";
            imgLogIn.style.zIndex = "0"; 
        });
        
        btnLogIn.addEventListener('click', () => {
            transicao.style.left = "0"; 
            transicao.style.right = "50%";
        
            imgSigIn.style.transition = "opacity 2s";
            imgSigIn.style.opacity = "0";
            imgSigIn.style.zIndex = "0";
            imgLogIn.style.transition = "opacity 2s";
            imgLogIn.style.opacity = "1";
            imgLogIn.style.zIndex = "10";
        });

        <?php
        if(isset($_POST['cadastro'])){
        ?>
        console.log('Foi um post');
            transicao.style.left = "50%";
            transicao.style.right = "0"; 
        
            
            imgSigIn.style.transition = "opacity 2s";
            imgSigIn.style.opacity = "1";
            imgSigIn.style.zIndex = "1";
            imgLogIn.style.transition = "opacity 2s";
            imgLogIn.style.opacity = "0";
            imgLogIn.style.zIndex = "0"; 
        <?php
        }
        ?>
    </script>

    <script>
        // Função para formatar o CPF
        function formatarCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cpf.length <= 3) {
                return cpf;
            } else if (cpf.length <= 6) {
                return cpf.replace(/(\d{3})(\d{0,3})/, '$1.$2');
            } else if (cpf.length <= 9) {
                return cpf.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
            } else {
                return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
            }
        }

        // Captura o campo de entrada de CPF
        const cpfInput = document.getElementById('cpfInput');

        // Adiciona um ouvinte de evento de entrada para formatar o CPF conforme o usuário digita
        cpfInput.addEventListener('input', function() {
            const valorSemFormatacao = this.value.replace(/\D/g, '');
            const cpfFormatado = formatarCPF(valorSemFormatacao);
            this.value = cpfFormatado;
        });
    </script>

    <script>
        let btnResponsivo = document.querySelector('.menuResponsivoIcon');
        let menuMobile = document.querySelector('.menuResponsivo');
        var width = document.documentElement.clientWidth;

        btnResponsivo.addEventListener('click', () => {
            menuMobile.classList.toggle('display');
        });
        

    </script>

    
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
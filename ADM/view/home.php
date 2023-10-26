<?php
    session_start();
    if(isset($_SESSION['EMAIL'])){
        //ECHO 'TUDO CERTO';
       
    }else{
        session_destroy();
        header('location:../index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/homeStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>
<body>
    

    <header id="nav-menu">
        <div class="title">
            <i class="fa-solid fa-gear" onclick="turn();"></i> <h1>ADM</h1>
        </div>

        <ul>
            <a href="produtos.php"  ><i class="fa-sharp fa-solid fa-car"></i>  <li>Produtos</li></a>
            <a href="pedidos.php"  ><i class="fa-solid fa-truck"></i> <li>Pedidos</li></a>
            <a href="usuario.php"  ><i class="fa-solid fa-user"></i> <li>Usuário</li></a>
            <a href="alterarSenha.php" class="alterar-senha"><i class="fa-solid fa-lock"></i> <li id="alterar">Alterar Senha</li></a>
        </ul>

        <button id="logout" onclick="logout();">Logout</button>
    </header>

    <script>
        function logout() {
            // Redirecionar para a página de logout
            window.location.href = "../index.php?code=1"; 
        }
    </script>



    <iframe id="iframe" name="iframe" src="" frameborder="0">

    </iframe>







    <script>
        var v1 = document.getElementById("nav-menu");

        function turn(){
            v1.classList.toggle('active');
        }
    </script>


</body>
</html>
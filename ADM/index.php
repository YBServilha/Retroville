<?php
    session_start();
    if(isset($_GET['code'])){
        //ECHO 'TUDO CERTO';
        session_destroy();
    }else{
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="view/css/indexStyle.css" rel="stylesheet">
    <title>Adm</title>
</head>
<body>


    <div class="box-form">
        <form action="controller/loginController.php" method="post">
    <?php
        if(isset($_POST['msg'])){
    ?>
        <div class="msgInvalido" id="msgIncluiu">
        Usuário/senha inválidos!
        </div>
         
    <?php } ?>
            <h2>Login</h2>
            <input type="email" name="email" placeholder="Email..." value="teste@gmail.com"><br><br>

            <input type="password" name="senha" placeholder="Senha..." value="123"><br><br>

            <input type="submit" class="enviar" name="login" value="LOGIN">
        </form>
    </div>
    
</body>
</html>
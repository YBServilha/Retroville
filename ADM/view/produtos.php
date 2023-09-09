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
    <link rel="stylesheet" href="css/paginasStyle.css">
    <title>Document</title>
</head>
<body>
    <h1>PRODUTOS</h1>

    <div class="box">
        <a href="listaProdutos.php">
        <div class="box-item box-1">
            <p>Adicionar, editar e deletar produtos</p>
        </div>
        </a>

        <a href="#">
        <div class="box-item box-2">
            <p>Estatísticas de todos os produtos</p>
        </div>
        </a>

        </div>
    </div>
    
</body>
</html>
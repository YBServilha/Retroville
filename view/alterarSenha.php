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
    <h1>ALTERAR SENHA</h1>
    
</body>
</html>
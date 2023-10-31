<?php
    include_once('../model/siginModel.php');
    include_once('../../ADM/model/ferramentas.php');
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    $senhaHash = new Ferramentas($nome, $senha, null);
    $password = $senhaHash->hashSenha();
    $user = new Usuarios($email, $nome, $password, $cpf);
    $user->incluirUsuario();
    
    //$descrypto = $senhaHash->descriptografarSenha($password);
    //echo $password . '<br>'; 
    //echo $descrypto;
   


?>
<?php
    include_once('../model/siginModel.php');
    include_once('../../ADM/model/ferramentas.php');
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    $senhaHash = new Ferramentas($nome, $senha);
    $password = $senhaHash->hashSenha();
    $user = new Usuarios($nome, $password, $cpf);
    $descrypto = $senhaHash->descriptografarSenha($password);
    //echo $password . '<br>'; 
    //echo $descrypto;
    $user->incluirUsuario();


?>
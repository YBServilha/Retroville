<?php
    include_once('../model/siginModel.php');
    include_once('../../ADM/model/ferramentas.php');
    $email = $_POST['email'];
    $nome = '##';
    $senha = $_POST['senha'];
    $cpf = '##';

    $user = new Usuarios($email, $nome, $senha, $cpf);
    $senhaHash = new Ferramentas($nome, $senha);
    $password = $senhaHash->hashSenha();
    $user->validarUsuario($email,$password);


?>
<?php
    include_once('../model/siginModel.php');
    include_once('../../ADM/model/ferramentas.php');
    $senha = $_POST['senha'];
    $nova_senha = $_POST['nova_senha'];

    $senhaHash = new Ferramentas($nome, $senha);
    $password = $senhaHash->hashSenha();
    $user->validarUsuario($email,$password);


?>
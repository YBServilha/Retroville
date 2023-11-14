<?php
    include_once('../model/siginModel.php');
    include_once('../../ADM/model/ferramentas.php');
    include_once('../../ADM/model/Conexao.php');

    $email = $_POST['email'];
    $nome = '##';
    $senha = $_POST['senha'];
    $cpf = '##';

    $conn = new Conexao();
    $conexao = $conn->pegarConexao();

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
    //echo $email;
    $emailScape = mysqli_real_escape_string($conexao, $email);
    $senhaScape = mysqli_real_escape_string($conexao, $senha);
    //echo $emailScape;
    //exit();
    $user = new Usuarios($email, $nome, $senha, $cpf);
    $senhaHash = new Ferramentas($nome, $senha, null);
    $password = $senhaHash->hashSenha();
    $user->validarUsuario($email,$password);


?>
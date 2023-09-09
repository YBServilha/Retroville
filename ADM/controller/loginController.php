<?php
include_once '../model/ferramentas.php';
include_once '../model/Conexao.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $ferramentas = new Ferramentas($email, $senha);
    $senhaCriptografada = $ferramentas->hashSenha();
    $ferramentas->validarAdm($email, $senhaCriptografada);


    /*$ferramentas = new Ferramentas($descriptografarSenha($senhaHash);
    echo $senhaHash;$email, $senha);
    $senhaHash = $ferramentas->hashSenha();
    $senhaDescri = $ferramentas->
    echo '<br>';
    echo $senhaDescri;
    echo '<br>';
    $ferramentas->validarAdm($email, $senhaHash);*/

}





?>
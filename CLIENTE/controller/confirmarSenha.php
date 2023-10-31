<?php
    if(isset($_POST['editar'])){
        include_once('../model/siginModel.php');
        include_once('../../ADM/model/ferramentas.php');
        $senha = $_POST['senha'];
        $nova_senha = $_POST['nova_senha'];
        $email = $_POST['email'];

        $ferr = new Ferramentas($email, $senha, $nova_senha);
        $password = $ferr->hashSenha();
        $new_senha = $ferr->hashNewSenha();
        $ferr->validarSenha($email, $password, $new_senha);
    }if(isset($_POST['deletar'])){
        include_once('../model/siginModel.php');
        include_once('../../ADM/model/ferramentas.php');
        $email = $_POST['email'];

        $ferr = new Ferramentas($email, null, null);
        $ferr->excluirConta($email);
    }

?>
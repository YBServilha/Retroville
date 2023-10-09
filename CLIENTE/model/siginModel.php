<?php

class Usuarios{
    private $nome;
    private $senha;
    private $cpf;


    function __construct($nome, $senha, $cpf){
       $this->nome = $nome;
       $this->senha = $senha;
       $this->cpf = $cpf;
    }

    function incluirUsuario(){
        include_once('../../ADM/model/Conexao.php');
        $conexao = new Conexao();
        $sql = "INSERT INTO usuarios(nome, senha, cpf) VALUES('$this->nome','$this->senha','$this->cpf');";
        $conexao->executar($sql);
        header('Location: ../view/logSigin.html');
    }
    
}

?>
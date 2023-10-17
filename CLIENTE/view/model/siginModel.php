<?php

class Usuarios{
    private $email;
    private $nome;
    private $senha;
    private $cpf;


    function __construct($email, $nome, $senha, $cpf){
        $this->email = $email;
       $this->nome = $nome;
       $this->senha = $senha;
       $this->cpf = $cpf;
    }

    public function incluirUsuario(){
        include_once('../../ADM/model/Conexao.php');
        $conexao = new Conexao();
        $sql = "INSERT INTO usuarios(email, nome, senha, cpf) VALUES('$this->email','$this->nome','$this->senha','$this->cpf');";
        $conexao->executar($sql);
        header('Location: ../view/logSigin.html');
    }

    public function validarUsuario($email, $senha) {
        include_once('../../ADM/model/Conexao.php');
        $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha';";

        $conn = new Conexao();
        $conn->validarUsuario($query);

    }
    
}

?>
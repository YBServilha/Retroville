<?php
class Ferramentas{
    private $email;
    private $senha;

    function __construct($email, $senha){
        $this->email = $email;
        $this->senha = $senha;
    }

    function hashSenha(){
        $senhaCriptografada = base64_encode($this->senha);
        return $senhaCriptografada;
    }

    function descriptografarSenha($senhaHash){
        $senhaDescriptografada = base64_decode($senhaHash);
        return $senhaDescriptografada;
    }

    public function validarAdm($email, $senha) {
        include_once 'Conexao.php';
        $query = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha';";

        $conn = new Conexao();
        $conn->validar($query);

    }
}

?>
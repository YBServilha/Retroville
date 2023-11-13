<?php
class Ferramentas{
    private $email;
    private $senha;
    private $new_senha;

    function __construct($email, $senha, $new_senha){
        $this->email = $email;
        $this->senha = $senha;
        $this->new_senha = $new_senha;
    }

    function hashSenha(){
        $senhaCriptografada = base64_encode($this->senha);
        return $senhaCriptografada;
    }

    function hashNewSenha(){
        $senhaCriptografada = base64_encode($this->new_senha);
        return $senhaCriptografada;
    }

    function descriptografarSenha($senhaHash){
        $senhaDescriptografada = base64_decode($senhaHash);
        return $senhaDescriptografada;
    }

    function validarAdm($email, $senha) {
        include_once 'Conexao.php';
        $query = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha';";

        $conn = new Conexao();
        $conn->validar($query);

    }

    function validarSenha($email, $senha, $new_senha){
        include_once 'Conexao.php';
        $conn = new Conexao();
        $sql1 = "SELECT* FROM usuarios WHERE email = '$email';";
        $dados = $conn->consultarDados($sql1);
        foreach($dados as $dado){
            //var_dump($dado);
        if($dado['senha'] == $senha){
            $sql2 = "UPDATE usuarios SET senha = '$new_senha' WHERE email = '$email';";
            $conn->executar($sql2);
            header('Location: ../../CLIENTE/view/dadosUsuario.php');
            //COLOCAR MENSAGEM AQUII
        }else{
            header('Location: ../../CLIENTE/view/dadosUsuario.php');
            //COLOCAR MENSAGEM AQUI
        }
    }
    }

    function excluirConta($email){
        include_once 'Conexao.php';
        $conn = new Conexao();
        $sql = "DELETE FROM usuarios WHERE email = '$email'";
        $conn->executar($sql);
        header('Location: ../../index.php?desconectar&msg_excluir');
    }
}

?>
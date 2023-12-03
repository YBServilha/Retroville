<?php

class Pedidos{
    private $cpf;
    private $nome;
    private $nome_produto;
    private $preco;
    private $cod;
    private $imgCard;


    function __construct($cpf, $nome, $nome_produto, $preco, $cod, $imgCard){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->nome_produto = $nome_produto;
        $this->preco = $preco;
        $this->cod = $cod;
        $this->imgCard = $imgCard;
    }

    public function incluirPedido(){
        include_once('../../ADM/model/Conexao.php');
        $conexao = new Conexao();
        $sql = "INSERT INTO pedidos(cpf, nome, nome_produto, preco, cod, imgCard) VALUES('$this->cpf','$this->nome','$this->nome_produto','$this->preco','$this->cod','$this->imgCard');";
        $conexao->executar($sql);
        header('Location: pagamento.php');
    }

}
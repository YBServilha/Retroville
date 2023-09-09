<?php

class Produto{
    private $marca;
    private $modelo;
    private $carroceria;
    private $preco;
    private $motor;
    private $cor;
    private $km;
    private $ano;
    private $cambio;
    private $finalPlaca;
    private $historia;
    private $imgCard;
    private $imgCapa;
    private $imgHistoria;
    private $img1;
    private $img2;
    private $img3;
    private $img4;
    private $img5;
    private $img6;
    private $img7;
    private $img8;


    function __construct($marca,$modelo,$carroceria,$preco,$motor,$cor,$km,$ano,$cambio,$finalPlaca,$historia,$imgCard,$imgCapa,$imgHistoria,$img1,$img2,$img3,$img4,$img5,$img6,$img7, $img8){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->carroceria = $carroceria;
        $this->preco = $preco;
        $this->motor = $motor;
        $this->cor = $cor;
        $this->km = $km;
        $this->ano = $ano;
        $this->cambio = $cambio;
        $this->finalPlaca = $finalPlaca;
        $this->historia = $historia;
        $this->imgCard = $imgCard;
        $this->imgCapa = $imgCapa;
        $this->imgHistoria = $imgHistoria;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->img4 = $img4;
        $this->img5 = $img5;
        $this->img6 = $img6;
        $this->img7 = $img7;
        $this->img8 = $img8;
    }
    function gerarCode($tamanho = 8) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $caracteresLength = strlen($caracteres);
        $resultado = '';
    
        for ($i = 0; $i < $tamanho; $i++) {
            $randomIndex = rand(0, $caracteresLength - 1);
            $resultado .= $caracteres[$randomIndex];
        }
    
        return $resultado;
    }

    function incluir($cod){
        include_once 'Conexao.php';
        //$cod = Produto::gerarCode();
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtualFormatada = date('d-m-Y H:i:s');
        $sql = "INSERT INTO produtos(cod, data, marca,modelo,carroceria,preco,motor,cor,km,ano,cambio,finalPlaca,textocarro,imgCard,imgCapa,imgHistoria,img1,img2,img3,img4,img5,img6,img7, img8) VALUES('$cod', '$dataAtualFormatada', '$this->marca','$this->modelo','$this->carroceria','$this->preco','$this->motor','$this->cor','$this->km','$this->ano','$this->cambio','$this->finalPlaca','$this->historia','$this->imgCard','$this->imgCapa','$this->imgHistoria','$this->img1','$this->img2','$this->img3','$this->img4','$this->img5','$this->img6','$this->img7','$this->img8');";
        $conn = new Conexao();
        $conn->executar($sql);
    }

    function listar(){
        include_once 'Conexao.php';
        
    }

    function editar($cod) {
        include_once 'Conexao.php';
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtualFormatada = date('d-m-Y H:i:s');
        
        $sql = "UPDATE produtos SET
            data = '$dataAtualFormatada',
            marca = '$this->marca',
            modelo = '$this->modelo',
            carroceria = '$this->carroceria',
            preco = '$this->preco',
            motor = '$this->motor',
            cor = '$this->cor',
            km = '$this->km',
            ano = '$this->ano',
            cambio = '$this->cambio',
            finalPlaca = '$this->finalPlaca',
            textocarro = '$this->historia',
            imgCard = '$this->imgCard',
            imgCapa = '$this->imgCapa',
            imgHistoria = '$this->imgHistoria',
            img1 = '$this->img1',
            img2 = '$this->img2',
            img3 = '$this->img3',
            img4 = '$this->img4',
            img5 = '$this->img5',
            img6 = '$this->img6',
            img7 = '$this->img7',
            img8 = '$this->img8'
            WHERE cod = '$cod';";
        
        $conn = new Conexao();
        $conn->executar($sql);
    }

    function excluir($cod){
        include_once 'Conexao.php';
        $sql = "delete from produtos where cod = '$cod'";
        $conn = new Conexao();
        $conn->executar($sql);
    }
    
}

?>
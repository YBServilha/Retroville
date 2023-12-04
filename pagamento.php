<?php


require __DIR__.'/vendor/autoload.php';
session_start();
use \App\Pix\Payload;

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output; 

//INSTANCIA PRINCIPAL DO PAYLOAD PIX

if(isset($_POST['valorTotal'])){
    $valorTotal = $_POST['valorTotal'];

    //echo $valorTotal;
    //exit();

$obPayload = (new Payload)->setPixKey('54447462800')
                          ->setDescription('Pagamento B')
                          ->setMerchantName("Yan Barbosa Servilha")
                          ->setMerchantCity("SAO PAULO")
                          ->setAmount($valorTotal)
                          ->setTxid('WDEV1234');    

//CODIGO DE PAGAMENTO PIX
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new QrCode($payloadQrCode);

//IMAGEM DO QRCODE
$image = (new Output\Png)->output($obQrCode,400);

header('Content-Type: image/png');
echo $image;



include_once('CLIENTE/model/pedidosModel.php');
include_once('ADM/model/ferramentas.php');
include_once('ADM/model/Conexao.php');

//$codigo = $_POST['codigo'];
$cpf = $_SESSION['CPF'];
$nome = $_SESSION['NOME'];
//$preco = $_POST['preco'];
//$cod = $_POST['cod'];
//$imgCard = $_POST['imgCard'];

$conexao = new Conexao();
$sql1 = "SELECT * FROM carrinho WHERE cod_usuario = '$cpf'";
$resultados = $conexao->consultarDados($sql1);

foreach($resultados as $resultado){
$nome_produto = $resultado['marca'] . "_" . $resultado['modelo'];

$sql = "INSERT INTO pedidos(cpf, nome, nome_produto, preco, cod, imgCard) VALUES('$cpf', '$nome', '$nome_produto', '{$resultado["preco"]}','{$resultado["cod_produto"]}','{$resultado["imgCard"]}');";
$conexao->executar($sql);
}
/*$conn = new Conexao();
$conexao = $conn->pegarConexao();

$pedido = new Pedidos($cpf, $nome, $nome_produto, $preco, $cod, $imgCard);
$pedido->incluirPedido();
*/

?>

<!--<h1>QR code PIX</h1>


<br>

<img src="data:image/png;base64, <?=base64_encode($image)?>">

<br><br>-->
<?php
}else{
    ?>
    <head>
        <style>
            body{
                margin: 0;
                padding:0;
                box-sizing: border-box;
                background: black;
                width: 100%;
                height: 100vh;
            }
            #msg{
                color: #4BEB48;
                position: absolute;
                top: 10%;
                left: 50%;
                transform: translateX(-50%);
                font-size: 42px;
                width: 100%;
                
            }

        @keyframes dots {
            0% { content: ". "; }
            33% { content: ".. "; }
            66% { content: "... "; }
            100% { content: ". "; }
        }

        #dots::before {
            content: "";
            display: inline-block;
            animation: dots 1.5s infinite;
        }
        #gif{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 50vh;
            object-fit: cover;
            pointer-events: none;
        }
        #gif2{
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 80vh;
            object-fit: cover;
            pointer-events: none;
            display: none;
        }
        </style>
    </head>
    <center><h1 id="msg">Área restrita! Hackeando a sua máquina<span id="dots"></span></h1></center>
    <img src="https://media.tenor.com/zEzrCBd_6i8AAAAd/hacker%C4%B1m-hacker.gif" alt="gif" id="gif">
    <img src="https://steamuserimages-a.akamaihd.net/ugc/2431257904741262239/5224F69217562A3C070E381FE3DAC295BCF5C9A8/?imw=1024&imh=575&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" alt="gif" id="gif2">

    <script>
        setTimeout(function() {
            var gif = document.getElementById("gif");
            gif.style.display = "none";

            var gif2 = document.getElementById("gif2");
            gif2.style.display = "block";
        }, 6340); 

        window.addEventListener("beforeunload", function (e) {
            e.preventDefault();
            e.returnValue = "Deseja realmente sair desta página?";
        });
    </script>
    <?php

    
}


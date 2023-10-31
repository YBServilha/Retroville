<?php 

include_once('../model/carrinhoModel.php');

if(isset($_POST['formExcluir'])){
    $codUsuario = $_POST['codUsuario'];
    $codProduto = $_POST['codProduto'];

    //echo $codUsuario;
    $carrinho = new Carrinho($codUsuario, $codProduto, null, null, null, null, null, null, null, null, null);
    $carrinho->deletarItem($codUsuario, $codProduto);
}

?>
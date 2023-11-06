<?php 

session_start();
if(isset($_SESSION['EMAIL'])){
    //ECHO 'TUDO CERTO';
   
}else{
    session_destroy();
    header('location:../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto</title>
    <link href="css/adicionarProdutosStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1 class="mt-5">Adicionar Produtos</h1>
    <?php
    if(isset($_POST['incluiu'])){
    ?>
    <div class="container col-5">
    <div class="alert alert-success mt-5" role="alert" id="msgIncluiu">
      Produto incluído com sucesso!
    </div>
    </div>  
    <?php } ?>
    <div class="container col-5 mt-5">
    <form action="../controller/produtosController.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Marca</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Modelo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Modelo" name="modelo" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Carroceria do Carro</label>
          <select class="form-control" id="exampleFormControlSelect2" name="carroceria" required>
            <option value="Hatch">Hatch</option>
            <option value="Sedan">Sedan</option>
            <option value="SUV">SUV</option>
            <option value="Caminhonete">Caminhonete</option>
            <option value="Coupe">Coupe</option>
            <option value="Conversivel">Conversivel</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Preço</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Preço" name="preco" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Especificações</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Motor" name="motor" required><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cor" name="cor" required><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Km rodados" name="km" required><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ano" name="ano" required><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Câmbio"  name="cambio" required><br>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Final da Placa" name="finalPlaca" required><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">História do carro</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="texto" required></textarea>
          </div>
        <div class="form-group mt-5">
            <label for="exampleFormControlInput1">Imagem Card</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1"  name="imgCard" required>
          </div>
          <div class="form-group mt-5">
            <label for="exampleFormControlInput1">Imagem Capa</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgCapa" required>
          </div>
          <div class="form-group mt-5">
            <label for="exampleFormControlInput1">Imagem História</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgHistoria" required>
          </div>

          <div class="form-group mt-5">
            <label for="exampleFormControlInput1">Imagem Gerais</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img1" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img2" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img3" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img4" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img5" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img6" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img7" required><br>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img8" required><br>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect2">Status do Carro</label>
          <select class="form-control" id="exampleFormControlSelect2" name="status" required>
            <option value="0">0 - Vendido</option>
            <option value="1">1 - Disponível</option>
          </select>
        </div>
            <input type="submit" name="btnIncluir" value="Adicionar" class="btn btn-success btn-lg btn-block mb-5">
      </form>
    </div>
    
</body>
</html>
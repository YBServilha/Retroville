<?php 

session_start();
if(isset($_SESSION['EMAIL'])){
    //ECHO 'TUDO CERTO';
   
}else{
    session_destroy();
    header('location:../index.php');
}

include_once '../model/Conexao.php';

if (isset($_GET['cod'])) {
  $codProduto = $_GET['cod'];
  
  // Consultar os detalhes do produto com base no código
  $conn = new Conexao();
  $sql = "SELECT * FROM produtos WHERE cod = '$codProduto'";
  $resultados = $conn->consultarDados($sql);

  // Verificar se foram encontrados resultados
  if (!empty($resultados)) {
      $produto = $resultados[0]; // Primeiro resultado encontrado
  }
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
    <h1 class="mt-5">Editar Produto</h1>

    <div class="container col-5 mt-5" >
      <?php
      foreach($resultados as $resultado){

      ?>
    <form action="../controller/produtosController.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Marca</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Marca" value="<?php echo $resultado['marca'];?>" name="marca">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Modelo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Modelo" value="<?php echo $resultado['modelo'];?>" name="modelo">
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect2">Carroceria do Carro</label>
        <select class="form-control" id="exampleFormControlSelect2" name="carroceria">
          <option <?php if ($resultado['carroceria'] === 'Hatch') echo 'selected'; ?>>Hatch</option>
          <option <?php if ($resultado['carroceria'] === 'Sedan') echo 'selected'; ?>>Sedan</option>
          <option <?php if ($resultado['carroceria'] === 'SUV') echo 'selected'; ?>>SUV</option>
          <option <?php if ($resultado['carroceria'] === 'Caminhonete') echo 'selected'; ?>>Caminhonete</option>
          <option <?php if ($resultado['carroceria'] === 'Coupe') echo 'selected'; ?>>Coupe</option>
          <option <?php if ($resultado['carroceria'] === 'Conversivel') echo 'selected'; ?>>Conversivel</option>
        </select>
      </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Preço</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Preço" value="<?php echo $resultado['preco'];?>" name="preco">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Especificações</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Motor"value="<?php echo $resultado['motor'];?>" name="motor"><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cor" value="<?php echo $resultado['cor'];?>" name="cor"><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Km rodados" value="<?php echo $resultado['km'];?>" name="km"><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ano" value="<?php echo $resultado['ano'];?>" name="ano"><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Câmbio" value="<?php echo $resultado['cambio'];?>" name="cambio"><br>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Final da Placa" value="<?php echo $resultado['finalPlaca'];?>" name="finalPlaca"><br>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">História do carro</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="texto"><?php echo $resultado['textoCarro'];?></textarea>
          </div>

            <?php
            //$imgCaminho = "img/imgProdutos/".$resultado['modelo'].'_'.$resultado['cod'].'/'.$resultado['img1'];
            $imgCaminho = "img/imgProdutos/".$resultado['modelo'].'_'.$resultado['cod'].'/';
            //echo $imgCaminho;
            
            ?>
        <div class="form-group mt-5">
            <label for="exampleFormControlInput1"><h5>Imagem Card:</h5></label><br>
            <img src="<?php echo $imgCaminho.$resultado['imgCard']; ?>" alt="Imagem <?php echo $resultado['imgCard']; ?>" class="image-preview" width="300px">
            <p>Nome do arquivo: <?php echo $resultado['imgCard']; ?></p>
            <input type="hidden" name="imgCardAntiga" value="<?php echo $resultado['imgCard']?>">
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgCard">
          </div>
          <div class="form-group mt-5">
            <label for="exampleFormControlInput1"><h5>Imagem Capa:</h5></label><br>
            <img src="<?php echo $imgCaminho.$resultado['imgCapa']; ?>" alt="Imagem <?php echo $imgCaminho.$resultado['imgCapa']; ?>" class="image-preview" width="300px">
            <p>Nome do arquivo: <?php echo $resultado['imgCapa']; ?></p>
            <input type="hidden" name="imgCapaAntiga" value="<?php echo $resultado['imgCapa']?>">
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgCapa">
          </div>
          <div class="form-group mt-5">
            <label for="exampleFormControlInput1"><h5>Imagem História:</h5></label><br>
            <img src="<?php echo $imgCaminho.$resultado['imgHistoria']; ?>" alt="Imagem <?php echo $imgCaminho.$resultado['imgHistoria']; ?>" class="image-preview" width="300px">
            <p>Nome do arquivo: <?php echo $resultado['imgHistoria']; ?></p>
            <input type="hidden" name="imgHistoriaAntiga" value="<?php echo $resultado['imgHistoria']?>">
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imgHistoria">
          </div>

          <div class="form-group mt-5">
          <label for="exampleFormControlInput1"><h4>Imagem Gerais:</h4></label>
          
          <?php
          for ($i = 1; $i <= 8; $i++) {
            $imgKey = "img" . $i;
            $imgValue = $resultado[$imgKey];
            
          ?>
          <div class="image-container">
            <h5>Imagem <?php echo $i;?>:</h5>
            <img src="<?php echo $imgCaminho.$imgValue; ?>" alt="Imagem <?php echo $imgCaminho.$imgValue; ?>" class="image-preview" width="300px">
            <p>Nome do arquivo: <?php echo $imgValue;?></p>
            <input type="hidden" name="<?php echo $imgKey;?>Antiga" value="<?php echo $imgValue;?>">
            <input type="file" class="form-control-file" id="exampleFormControlFile" name="<?php echo $imgKey;?>"><br><br>
          </div>
          <?php
          }
          ?>
          <!-- Repita para as outras imagens (img3, img4, etc.) -->

        </div>
        <input type="hidden" name="cod" value="<?php echo $resultado['cod'];?>">
        <input type="submit" value="Editar" class="btn btn-primary btn-lg btn-block mb-5" name="btnEditar">
        </form>
        </div>
    <?php
      }
    ?>
</body>
</html>
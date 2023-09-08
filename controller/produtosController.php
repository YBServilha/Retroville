<?php 
include_once '../model/produtos.php';

//INCLUIR PRODUTOS
if(isset($_POST['btnIncluir'])){
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $carroceria = $_POST['carroceria'];
    $preco = $_POST['preco'];
    $motor = $_POST['motor'];
    $cor = $_POST['cor'];
    $km = $_POST['km'];
    $ano = $_POST['ano'];
    $cambio = $_POST['cambio'];
    $finalPlaca = $_POST['finalPlaca'];
    $texto = $_POST['texto'];
    $imgCard = $_FILES['imgCard']['name'];
    $imgCapa = $_FILES['imgCapa']['name'];
    $imgHistoria = $_FILES['imgHistoria']['name'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];
    $img4 = $_FILES['img4']['name'];
    $img5 = $_FILES['img5']['name'];
    $img6 = $_FILES['img6']['name'];
    $img7 = $_FILES['img7']['name'];
    $img8 = $_FILES['img8']['name'];

    




    $produtos = new Produto($marca,$modelo,$carroceria,$preco,$motor,$cor,$km,$ano,$cambio,$finalPlaca,$texto,$imgCard,$imgCapa,$imgHistoria,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8);
    $cod = $produtos->gerarCode();

    $productFolder = "{$modelo}_{$cod}";
    $productFolderPath = "../view/img/imgProdutos/{$productFolder}/";
    mkdir("../view/img/imgProdutos/{$productFolder}");

    // Move uploaded images to the product folder
    move_uploaded_file($_FILES['imgCard']['tmp_name'], $productFolderPath . $_FILES['imgCard']['name']);
    move_uploaded_file($_FILES['imgCapa']['tmp_name'], $productFolderPath . $_FILES['imgCapa']['name']);
    move_uploaded_file($_FILES['imgHistoria']['tmp_name'], $productFolderPath . $_FILES['imgHistoria']['name']);
    move_uploaded_file($_FILES['img1']['tmp_name'], $productFolderPath . $_FILES['img1']['name']);
    move_uploaded_file($_FILES['img2']['tmp_name'], $productFolderPath . $_FILES['img2']['name']);
    move_uploaded_file($_FILES['img3']['tmp_name'], $productFolderPath . $_FILES['img3']['name']);
    move_uploaded_file($_FILES['img4']['tmp_name'], $productFolderPath . $_FILES['img4']['name']);
    move_uploaded_file($_FILES['img5']['tmp_name'], $productFolderPath . $_FILES['img5']['name']);
    move_uploaded_file($_FILES['img6']['tmp_name'], $productFolderPath . $_FILES['img6']['name']);
    move_uploaded_file($_FILES['img7']['tmp_name'], $productFolderPath . $_FILES['img7']['name']);
    move_uploaded_file($_FILES['img8']['tmp_name'], $productFolderPath . $_FILES['img8']['name']);
    // Repeat for other images...

    $produtos->incluir($cod);
    ?>
    <form action="../view/adicionarProdutos.php" method="post" name="formIncluir" id="formIncluir">
        <input type="hidden" name="incluiu">
    </form>
    <script>
        var form = document.getElementById('formIncluir');
        form.submit();
    </script>
    <?php
}


/* Editar Produto */

if(isset($_POST['btnEditar'])){
    $cod = $_POST['cod'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $carroceria = $_POST['carroceria'];
    $preco = $_POST['preco'];
    $motor = $_POST['motor'];
    $cor = $_POST['cor'];
    $km = $_POST['km'];
    $ano = $_POST['ano'];
    $cambio = $_POST['cambio'];
    $finalPlaca = $_POST['finalPlaca'];
    $texto = $_POST['texto'];

    // Nome das novas imagens
    $novaImgCard = $_FILES['imgCard']['name'];
    $novaImgCapa = $_FILES['imgCapa']['name'];
    $novaImgHistoria = $_FILES['imgHistoria']['name'];
    $novaImg1 = $_FILES['img1']['name'];
    $novaImg2 = $_FILES['img2']['name'];
    $novaImg3 = $_FILES['img3']['name'];
    $novaImg4 = $_FILES['img4']['name'];
    $novaImg5 = $_FILES['img5']['name'];
    $novaImg6 = $_FILES['img6']['name'];
    $novaImg7 = $_FILES['img7']['name'];
    $novaImg8 = $_FILES['img8']['name'];


    //$produtos = new Produto($marca, $modelo, $carroceria, $preco, $motor, $cor, $km, $ano, $cambio, $finalPlaca, $texto);

    $productFolder = "{$modelo}_{$cod}";
    $productFolderPath = "../view/img/imgProdutos/{$productFolder}/";

    if(!empty($_FILES['imgCard']['name'])) {
        // Se uma nova imagem foi selecionada, mova a nova imagem e exclua a imagem antiga, se existir
        if (file_exists($productFolderPath . $_POST['imgCardAntiga'])) {
            unlink($productFolderPath . $_POST['imgCardAntiga']);
        }
        move_uploaded_file($_FILES['imgCard']['tmp_name'], $productFolderPath . $_FILES['imgCard']['name']);
        $imgCard = $_FILES['imgCard']['name'];
    } else {
        // Se nenhuma nova imagem foi selecionada, mantenha a imagem existente
        $imgCard = $_POST['imgCardAntiga'];
    }


    if(!empty($_FILES['imgCapa']['name'])) {
        // Se uma nova imagem foi selecionada, mova a nova imagem e exclua a imagem antiga, se existir
        if (file_exists($productFolderPath . $_POST['imgCapaAntiga'])) {
            unlink($productFolderPath . $_POST['imgCapaAntiga']);
        }
        move_uploaded_file($_FILES['imgCapa']['tmp_name'], $productFolderPath . $_FILES['imgCapa']['name']);
        $imgCapa = $_FILES['imgCapa']['name'];
    } else {
        // Se nenhuma nova imagem foi selecionada, mantenha a imagem existente
        $imgCapa = $_POST['imgCapaAntiga'];
    }

    if(!empty($_FILES['imgHistoria']['name'])) {
        // Se uma nova imagem foi selecionada, mova a nova imagem e exclua a imagem antiga, se existir
        if (file_exists($productFolderPath . $_POST['imgHistoriaAntiga'])) {
            unlink($productFolderPath . $_POST['imgHistoriaAntiga']);
        }
        move_uploaded_file($_FILES['imgHistoria']['tmp_name'], $productFolderPath . $_FILES['imgHistoria']['name']);
        $imgHistoria = $_FILES['imgHistoria']['name'];
    } else {
        // Se nenhuma nova imagem foi selecionada, mantenha a imagem existente
        $imgHistoria = $_POST['imgHistoriaAntiga'];
    }

    for ($i = 1; $i <= 8; $i++) {
        $nomeInput = "img" . $i;
        $nomeInputAntiga = $nomeInput . "Antiga";
    
        if (!empty($_FILES[$nomeInput]['name'])) {
            // Se uma nova imagem foi selecionada, mova a nova imagem e exclua a imagem antiga, se existir
            if (file_exists($productFolderPath . $_POST[$nomeInputAntiga])) {
                unlink($productFolderPath . $_POST[$nomeInputAntiga]);
            }
            move_uploaded_file($_FILES[$nomeInput]['tmp_name'], $productFolderPath . $_FILES[$nomeInput]['name']);
            $$nomeInput = $_FILES[$nomeInput]['name'];
        } else {
            // Se nenhuma nova imagem foi selecionada, mantenha a imagem existente
            $$nomeInput = $_POST[$nomeInputAntiga];
        }
    }
    
    


    // Atualiza os detalhes do produto no banco de dados
    $produtos = new Produto($marca, $modelo, $carroceria, $preco, $motor, $cor, $km, $ano, $cambio, $finalPlaca, $texto, $imgCard, $imgCapa, $imgHistoria, $img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8);
    $produtos->editar($cod);

    ?>
    <form action="../view/editarProdutos.php" method="get" name="formEditar" id="formEditar">
        <input type="hidden" name="cod" value="<?php echo $cod;?>">
        <input type="hidden" name="editou">
    </form>
    <script>
        var form = document.getElementById('formEditar');
        form.submit();
    </script>
    <?php
}

if (isset($_POST['btnExcluir'])) {
    $cod = $_POST['cod'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $imgFolder = "../view/img/imgProdutos/{$modelo}_{$cod}";

    // Função para excluir recursivamente um diretório e seu conteúdo
    function deleteDirectory($dir) {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), array('.', '..'));
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            is_dir($path) ? deleteDirectory($path) : unlink($path);
        }

        rmdir($dir);
    }

    // Exclua o diretório e seu conteúdo
    deleteDirectory($imgFolder);

    // Agora, você pode excluir o registro do banco de dados (se necessário)
    $null = '';
    $produtos = new Produto($null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null, $null);
    $produtos->excluir($cod);

    ?>
    <form action="../view/listaProdutos.php" method="post" name="formExcluir" id="formExcluir">
        <input type="hidden" name="cod" value="<?php echo $cod;?>">
        <input type="hidden" name="marca" value="<?php echo $marca;?>">
        <input type="hidden" name="modelo" value="<?php echo $modelo;?>">
        <input type="hidden" name="excluiu">
    </form>
    <script>
        var form = document.getElementById('formExcluir');
        form.submit();
    </script>
    <?php
}




?>
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
    <link href="css/listaProdutosStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Lista de produtos</title>
</head>
<body>
    <h1 class="mt-3">Lista de produtos</h1>

    <!--<table>
        <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Potência</th>
            <th>Carroceria</th>
            <th>Km</th>
            <th>Ano</th>
            <th>Cor</th>
        </tr>
    </table>-->

    <div class="container-fluid mt-3">
    <div class="table-responsive" style="max-height: 400px; overflow-y: scroll;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">cod</th>
                    <th scope="col">data</th>
                    <th scope="col">imgCard</th>
                    <th scope="col">marca</th>
                    <th scope="col">modelo</th>
                    <th scope="col">carroceria</th>
                    <th scope="col">preco</th>
                    <th scope="col">motor</th>
                    <th scope="col">cor</th>
                    <th scope="col">km</th>
                    <th scope="col">ano</th>
                    <th scope="col">cambio</th>
                    <th scope="col">Final Placa</th>
                    <th scope="col">Historia</th>
                    <th scope="col">Adicionar</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Editar</th>
                    <a class="btn btn-success" href="adicionarProdutos.php">adicionar</a>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../model/Conexao.php';
                $conn = new Conexao();
                $sql = "SELECT * FROM produtos"; // Sua consulta SQL aqui
                $resultados = $conn->consultarDados($sql);

                foreach ($resultados as $resultado) {
                    echo '<tr>';
                    echo '<th scope="row">' . $resultado['id'] . '</th>';
                    echo '<td>' . $resultado['cod'] . '</td>';
                    echo '<td>' . $resultado['data'] . '</td>';
                    echo '<td>' . $resultado['imgCard'] . '</td>';
                    echo '<td>' . $resultado['marca'] . '</td>';
                    echo '<td>' . $resultado['modelo'] . '</td>';
                    echo '<td>' . $resultado['carroceria'] . '</td>';
                    echo '<td>' . $resultado['preco'] . '</td>';
                    echo '<td>' . $resultado['motor'] . '</td>';
                    echo '<td>' . $resultado['cor'] . '</td>';
                    echo '<td>' . $resultado['km'] . '</td>';
                    echo '<td>' . $resultado['ano'] . '</td>';
                    echo '<td>' . $resultado['cambio'] . '</td>';
                    echo '<td>' . $resultado['finalPlaca'] . '</td>';
                    echo '<td>' . $resultado['textoCarro'] . '</td>';
                    echo '<td><a class="btn btn-success" href="adicionarProdutos.php">adicionar</a></td>';
                    echo '<td><a class="btn btn-danger" href="adicionarProdutos.php">excluir</a></td>';
                    echo '<td><a class="btn btn-primary" href="editarProdutos.php?cod=' . $resultado['cod'] . '">editar</a></td>';
    echo '</tr>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

    
</body>
</html>
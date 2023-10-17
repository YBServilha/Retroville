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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/listaProdutosStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <H1 style="margin-top:20px;">Lista de usuários</H1>

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

    <div class="container-fluid mt-3 h-100">
    
    <div class="table-responsive h-100" style="overflow-y: scroll;">
        <table class="table h-100">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">cpf</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../model/Conexao.php';
                $conn = new Conexao();
                $sql = "SELECT * FROM usuarios"; // Sua consulta SQL aqui
                $resultados = $conn->consultarDados($sql);

                foreach ($resultados as $resultado) {
                    echo '<tr>';
                    echo '<th scope="row">' . $resultado['id'] . '</th>';
                    echo '<td>' . $resultado['nome'] . '</td>';
                    echo '<td>' . $resultado['email'] . '</td>';
                    echo '<td>' . $resultado['cpf'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
    
</body>
</html>
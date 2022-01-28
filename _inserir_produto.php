<?php

include 'conexao.php';

//RECEBE O VALOR DO ATRIBUTO
$nomeproduto = $_POST['nomeproduto'];
$cor = $_POST['cor'];
$preco = $_POST['preco'];

$sql = "INSERT INTO `produtos`( `nome`, `cor`) VALUES ('$nomeproduto','$cor')";
$sql2 = "INSERT INTO `precos`( `preco`) VALUES ('$preco')";

$inserir = mysqli_query($conexao, $sql);
$inserir2 = mysqli_query($conexao, $sql2);

header('location: adicionar_produtos.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width: 500px;">
        <center>
            <h4 class="mt-2">Produto adicionado com sucesso!</h4>
            <div style="padding-top: 20px;"></div>

            <a href="index.php" role="button" class="btn btn-sm btn-primary">Cadastrar novo Ítem</a>
        </center>
    </div>
</body>

</html>
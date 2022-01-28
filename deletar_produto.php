<?php
include 'conexao.php';
$id = $_GET['id'];

echo $sql = "DELETE produtos,precos FROM produtos INNER JOIN precos ON produtos.idprod = precos.idpreco where produtos.idprod and precos.idpreco = $id";
$deletar = mysqli_query($conexao, $sql);

header('location: listar_produtos.php');
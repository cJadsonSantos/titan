<?php

include 'conexao.php';

$id = $_POST['id'];
//$nroproduto = $_POST['nroproduto'];
$nomeproduto = $_POST['nomeproduto'];
$cor = $_POST['cor'];
$preco = $_POST['preco'];

$sql = "UPDATE `produtos` SET `nome`='$nomeproduto' WHERE idprod = $id";
$sql2 = "UPDATE `precos` SET `preco`='$preco' WHERE idpreco = $id";


$atualizar = mysqli_query($conexao, $sql);
$atualizar2 = mysqli_query($conexao, $sql2);
header('location: listar_produtos.php');

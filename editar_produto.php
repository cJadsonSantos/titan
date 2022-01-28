<?php
include 'conexao.php';

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        #tamanhoContainer {
            width: 500px;
        }
    </style>
</head>

<body>

    <div class="container" id="tamanhoContainer" style="margin-top: 40px;">
        <h4>Formulario de Cadastro</h4>
        <form action="_atualizar_produto.php" method="POST" style="margin-top: 20px;">
            <?php
            $sql = "
            SELECT
                p.idprod , p.nome, p.cor, pr.idpreco, pr.preco
            FROM 
                produtos as p LEFT JOIN precos AS pr ON (p.idprod = pr.idpreco)
            WHERE 
                p.idprod and pr.idpreco = $id
            ";

            $buscar = mysqli_query($conexao, $sql);
            while ($array = mysqli_fetch_array($buscar)) {
                $id_produto = $array['idprod'];
                $nomeproduto = $array['nome'];
                $cor = $array['cor'];
                $preco = $array['preco'];

            ?>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Numero do Produto</label>
                    <input type="number" name="nroproduto" class="form-control" value="<?php echo $id_produto ?>" disabled>
                    <input type="number" name="id" class="form-control" value="<?php echo $id ?>" hidden>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome Produtos</label>
                    <input type="text" name="nomeproduto" class="form-control" value="<?php echo $nomeproduto ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cor</label>
                    <input type="text" name="cor" class="form-control" value="<?php echo $cor ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Preço</label>
                    <input type="number" name="preco" step="any" class="form-control" value="<?php echo $preco ?>">
                </div>


                <div style="text-align: right;">
                    <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                </div>
            <?php } ?>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
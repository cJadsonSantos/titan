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

        <div style="text-align: right;">
            <a href="index.php" type="submit" class="btn btn-secondary btn-sm">Voltar</a>
        </div>

        <h4>Formulario de Cadastro</h4>
        <form action="_inserir_produto.php" method="POST" style="margin-top: 20px;">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome Produto</label>
                <input type="text" name="nomeproduto" class="form-control" placeholder="Insira o nome do produto" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cor</label>
                <input type="text" name="cor" class="form-control" placeholder="Insira a cor do produto" required autocomplete="off">
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Preço</label>
                <input type="number" name="preco" step="any" class="form-control" placeholder="Insira o preço do produto" autocomplete="off">
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
            </div>
        </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
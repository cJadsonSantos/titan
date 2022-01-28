<?php
$connect = new PDO("mysql:host=localhost;dbname=titan", "root", "");
if (isset($_POST["nome"])) {
    $busca = $_POST["nome"];

    $query = "SELECT p.idprod , p.nome, p.cor, pr.idpreco, pr.preco
    FROM produtos as p LEFT JOIN precos AS pr ON (p.idprod = pr.idpreco) 
    WHERE nome like '%" . $busca . "%' order by nome";
} else {
    $query = "SELECT p.idprod , p.nome, p.cor, pr.idpreco, pr.preco
    FROM produtos as p LEFT JOIN precos AS pr ON (p.idprod = pr.idpreco)
    WHERE p.idprod = pr.idpreco
    ORDER BY
    p.nome";
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$rowCount = $statement->rowCount();


if ($rowCount > 0) {
    $data = '
        <h3 class = "mt-4">Lista de Produtos</h3>
        <table class="table table-sm table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">id Produto</th>
                    <th scope="col">Nome Produto</th>
                    <th scope="col">Cor</th>
                    <th scope="col">id Preço</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Total</th>
                    <th scope="col">Acão</th>
                </tr>
            </thead>
	';
?>

    <?php
    foreach ($result as $row) {

        $desconto = $row["preco"];
        $preco = $row["preco"];

        $cor = $row['cor'];

        if ($row['cor'] == "azul" || $row['cor'] == "vermelho") {
            # code...
            $desconto = ($desconto / 100) * 20;
        } else if ($row['cor'] == "amarelo") {
            # code...
            $desconto =  ($desconto / 100) * 10;
        } else if ($row['cor'] == "vermelho" && $row['preco'] > 50) {
            # code...
            $desconto =  ($desconto / 100) * 5;
        } else {
            $desconto = 0;
        }
        $total = number_format($row["preco"] - $desconto, 2, ',', '.');


        $data .= '
			<tr>
				<th scope="row">' . $row["idprod"] . '</th>
				<td>' . $row["nome"] . '</td>
				<td>' . $row["cor"] . '</td>
				<th scope="row">' . $row["idpreco"] . '</th>
				<td>' . number_format($row["preco"] - $desconto, 2, ',', '.') . '</td>
				<td>' . $desconto . '</td>
				<td>' . $total . '</td>
               
                <td>
                <a href="editar_produto.php?id=' . $row["idprod"] . '"><i class="fas fa-edit"></i></a>
                <a href="deletar_produto.php?id=' . $row["idprod"] . '"><i class="fas fa-trash-alt"></i></a>
                </td>
			</tr>
		';
    }
    $data .= '</table></div>';
} else {
    $data = "Nenhum registro localizado.";
}

echo $data;

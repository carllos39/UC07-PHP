
<?php 
require_once "./backend/ProdutoDAO.php";
$dao =new ProdutoDAO();

$produtos =$dao->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h2>Lista de Produtos</h2>
    <a href="./frontend/produto_form.php">Cadastrar Novo Produto</a>
    <table border="1" cellpading="4">
        <tr>
            <th>Nome :</th>
            <th>Preço :</th>
              <th>Ações:</th>
        </tr>
        <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?=$produto->getNome()?></td>
             <td><?=$produto->getPreco()?></td>
             <td>
                <a href="./frontend/produto_details.php?id=<?=$produto->getId()?>">Detalhes</a>
                <a href="./frontend/produto_form.php?id=<?=$produto->getId()?>">Editar</a>
                <a href="./frontend/produto_delete.php?id=<?=$produto->getId()?>">Excluir</a>
             </td>
        </tr>

        <?php endforeach;?>

    </table>
    
</body>
</html>
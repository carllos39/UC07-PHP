<?php
session_start();

if(!isset($_SESSION['token'])){
    header("location:login.php");
    }

require_once '../backend/ProdutoDAO.php';
$dao = new ProdutoDAO();
$produtos=$dao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de Produtos</title>
        <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <h1>Lista de Produtos</h1>
    <table>
        <tr>
            <th>Nome :</th>
            <th>Preco :</th>
            <th>Ativo :</th>
            <th>Data de Cadastro :</th>
            <th>Data de Validade :</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
        <?php foreach($produtos as $produto): ?>
          <tr>
            <td><?=$produto->getId()?></td>
            <td><?=$produto->getNome()?></td>
            <td><?=$produto->getPreco()?></td>
             <td><?=$produto->getDataDeCadastro()?></td>
            <td><?=$produto->getDataDeValidade()?></td>
            <td><a href="form_produtos.php?id=<?=$produto->getId()?>">Alterar</a></td>
            <td><a href="../backend/excluir_produtos.php?id=<?=$produto->getId()?>">Excluir</a></td>
          </tr>
         <?php endforeach;  ?>

    </table>
<a href="form_produtos.php"><button>Cadastrar</button></a>  
</body>

</html>
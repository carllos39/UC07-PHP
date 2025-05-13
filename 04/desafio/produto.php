<?php 

session_start();

if(!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

if (isset($_GET['nome']) && isset($_GET['preco'])) {
    $nome = $_GET['nome'];
    $preco = (float) $_GET['preco'];    

    $_SESSION['produtos'][] = ["nome" => $nome, "preco" => $preco];
}

$produtos = $_SESSION['produtos'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Produto</th>
            <th>Preco</th>
        </tr>
    </table>
    <?php foreach($produtos as $produto){?>
      <tr>
        <td><?=$produto['nome']?></td>
        <td><?=$produto['preco']?></td>
      </tr>
    <?php }?>
</body>
</html>


<?php 
<<<<<<< HEAD

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
        <td><?=$produto['produto']?></td>
        <td><?=$produto['nome']?></td>
      </tr>
    <?php }?>
</body>
</html>

=======
$nome = $_GET['nome'];
$preco = $_GET['preco'];

$produtos[]=[$nome,$preco];
print_r($produtos);
?>

>>>>>>> 70169cf9001147ef4c48833226c453e2d2cc6f32

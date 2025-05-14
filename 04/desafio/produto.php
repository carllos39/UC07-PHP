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


function calcularPreco(array $itens){
$total=0;
foreach($itens as $item){
    $total += $item['preco'];

}
return $total;
}
echo"Total :".number_format(calcularPreco($produtos));
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

<<<<<<< HEAD
=======
=======
$nome = $_GET['nome'];
$preco = $_GET['preco'];
$produtos=[];

function cadastrarProdutos(array $itens):  {
    $total = 0;
    foreach ($itens as $item){
        $total += $item['nome','preco'];
    
    }
    return $total;
}
echo "Total:  " cadastrarProdutosProdutos($produtos);




?>

>>>>>>> 70169cf9001147ef4c48833226c453e2d2cc6f32
>>>>>>> d7fea2f6a58bf0c4c64ca87679e3f969d7199bac

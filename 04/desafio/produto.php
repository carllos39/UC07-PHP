<?php 
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


<?php 
$produtos =[
    ["nome" => "Pão", "preco" => 1.50],
    ["nome" => "Café", "preco" => 3.00],
    ["nome" => "Leite", "preco" => 4.80],
    ["nome" => "Cibalena", "preco" => 0.80],
    ["nome" => "Arroz", "preco" => 6.90],
    ["nome" => "Feijão", "preco" => 7.50],
    ["nome" => "Açúcar", "preco" => 3.20],
    ["nome" => "Sal", "preco" => 0.05],
    ["nome" => "Óleo", "preco" => 5.70],
    ["nome" => "Macarrão", "preco" => 4.10],
    ["nome" => "Queijo", "preco" => 12.30],
    ["nome" => "Presunto", "preco" => 10.90],
    ["nome" => "Biscoito", "preco" => 2.80],
    ["nome" => "Refrigerante", "preco" => 6.50]
    
];

function calcularTotalProdutos(array $itens): float {
    $total = 0;
    foreach ($itens as $item){
        $total += $item['preco'];
    
    }
    return $total;
}
echo "Total: R$ " . number_format(calcularTotalProdutos($produtos), 2, ',', '.');

// $maisBarato = $produtos[0];

// if($produtos[1]['preco'] < $produtos[0]['preco']) {
//     $maisBarato = $produtos[1];
// }

// echo $maisBarato['nome'];

function produtoMaisBarato(array $itens): array {
    $maisBarato = $itens[0];
    
    foreach($itens as $item) {
        if($item['preco'] < $maisBarato['preco']) {
            $maisBarato = $item;
        }
    }

    return $maisBarato;
}

$resultado = produtoMaisBarato($produtos);
echo "O item mais barato da lista é {$resultado['nome']} no preço de {$resultado['preco']}";


?>
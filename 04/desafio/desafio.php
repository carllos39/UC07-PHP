<!--
PHP + HTML

Crie um formulário que permita cadastrar até 3 produtos (nome e preço)
Use funções para:
- Inserir os produtos no array
- Listar os produtos cadastrados
- Calcular a média dos preços
-->
<?php
session_start();

if(!isset($_SESSION['produtos'])){
    $_SESSION['produtos']=[];
}
if(isset($_GET['nome'])&& isset($_GET['preco'])){
$nome = $_GET['nome'];
$preco = (float) $_GET['preco'];
$_SESSION['produtos'][]= ["nome" =>$nome,"preco" => $preco];
}

$produtos = $_SESSION['produtos'];


function calcularPreco(array $itens) {

$total=0;
foreach($itens as $Item){
  $total += $Item['preco'];
  
}
  return $total;
}
echo"Total:" .number_format(calcularPreco($produtos),2,',','.');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="desafio.php" method="get">
        <div>
            <label for="nome">Produto :</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="preco">Preço :</label>
            <input type="text" name="preco" id="preco">
        </div>
        <input type="submit"  value="Cadastrar">
    </form>
    
    <h2>Lista de Produtos</h2>
        <table border="1">
        <tr>
            <th>Produto</th>
            <th>Preço</th>
        </tr>
        <?php foreach($produtos as $produto){?>
             <tr>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['preco']?></td>
        </tr>  
      <?php  } ?>
    </table>
</body>
</html>
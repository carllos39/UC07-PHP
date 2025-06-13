<?php 
require_once '../backend/ProdutoDAO.php'; 

$dao = new ProdutoDAO();

$produtos=null;
if(isset($_GET['id'])){
    $produtos= $dao->getById((int)$_GET['id']);
}

if($_POST){
$id = filter_input(INPUT_POST,'id');
$nome= filter_input(INPUT_POST,'nome');
$preco = filter_input(INPUT_POST,'preco');
$ativo = filter_input(INPUT_POST,'ativo');
$dataDeCadastro = filter_input(INPUT_POST,'dataDeCadastro');
$dataDeValidade = filter_input(INPUT_POST,'dataDeValidade');
if($id){
$produtos = new Produto($id,$_POST['nome'],$_POST['preco'],$_POST['ativo'],$_POST['dataDeCadastro'],$_POST['dataDeValidade']);
$dao->update($produtos);
}else{
$produtos = new Produto(null,$_POST['nome'],$_POST['preco'],$_POST['ativo'],$_POST['dataDeCadastro'],$_POST['dataDeValidade']);
$dao->create($produtos);
header("location:form_produtos.php");
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<h1><?=$produtos?"Editar Produtos":"Cadastro de Produtos"?></h1>
<form action="" method="post">
    <?php if($produtos):?>
        <input type="text" name="id" value="<?=$produtos->getId()?>">
    <?php endif;?>
    <div>
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id="nome" value="<?=$produtos? $produtos->getNome():''?>">
    </div>
      <div>
        <label for="preco">Preço</label>
        <input type="number" name="preco" id="preco" value="<?=$produtos? $produtos->getPreco():''?>">
    </div>
      <div>
        <label for="ativo">Ativo :</label>
        <input type="checkbox" name="ativo" id="ativo" value="<?=$produtos? $produtos->getAtivo():''?>">
    </div>
      <div>
        <label for="Data de Cadastro"></label>
        <input type="date" name="dataDeCadastro" id="dataDeCadastro" value="<?=$produtos? $produtos->getDataDeCadastro():''?>">
    </div>
      <div>
        <label for="dataDeValidade">Data de Validade</label>
        <input type="date" name="dataDeValidade" id="dataDeValidade" value="<?=$produtos? $produtos->getDataDeValidade():''?>">
    </div>
<button type="submit">Cadastrar</button>
</form>
<a href="lista_produtos.php">lista</a>   
</body>
</html>
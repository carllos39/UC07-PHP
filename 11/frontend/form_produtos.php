<?php 
<<<<<<< HEAD
session_start();

if(!isset($_SESSION['token'])){
  header("location:login.php");
  }

=======
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
require_once '../backend/ProdutoDAO.php'; 

$dao = new ProdutoDAO();

$produtos=null;
<<<<<<< HEAD

if(isset($_GET['id'])){
    $produtos= $dao->getById($_GET['id']);
}

if($_POST){
$id = filter_input(INPUT_POST,'id')?? null;
=======
if(isset($_GET['id'])){
    $produtos= $dao->getById((int)$_GET['id']);
}

if($_POST){
$id = filter_input(INPUT_POST,'id');
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
$nome= filter_input(INPUT_POST,'nome');
$preco = filter_input(INPUT_POST,'preco');
$ativo = filter_input(INPUT_POST,'ativo');
$dataDeCadastro = filter_input(INPUT_POST,'dataDeCadastro');
$dataDeValidade = filter_input(INPUT_POST,'dataDeValidade');
<<<<<<< HEAD

$produtos = new Produto($id,$nome ,$preco,$ativo,$dataDeCadastro,$dataDeValidade);

if($id){

$dao->update($produtos);
}else{
$dao->create($produtos);
header("location:form_produtos.php");
exit;
=======
if($id){
$produtos = new Produto($id,$_POST['nome'],$_POST['preco'],$_POST['ativo'],$_POST['dataDeCadastro'],$_POST['dataDeValidade']);
$dao->update($produtos);
}else{
$produtos = new Produto(null,$_POST['nome'],$_POST['preco'],$_POST['ativo'],$_POST['dataDeCadastro'],$_POST['dataDeValidade']);
$dao->create($produtos);
header("location:form_produtos.php");
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
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
<<<<<<< HEAD
<form  method="post">
    <?php if($produtos):?>
        <input type="hidden" name="id" value="<?=$produtos->getId()?>">
=======
<form action="" method="post">
    <?php if($produtos):?>
        <input type="text" name="id" value="<?=$produtos->getId()?>">
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
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
<<<<<<< HEAD
        <input type="checkbox" name="ativo" id="ativo" value="1" value="<?=$produtos && $produtos->getAtivo() ?'checked':''?>">
    </div>
      <div>
        <label for="Data de Cadastro">Data de Cadastro</label>
=======
        <input type="checkbox" name="ativo" id="ativo" value="<?=$produtos? $produtos->getAtivo():''?>">
    </div>
      <div>
        <label for="Data de Cadastro"></label>
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
        <input type="date" name="dataDeCadastro" id="dataDeCadastro" value="<?=$produtos? $produtos->getDataDeCadastro():''?>">
    </div>
      <div>
        <label for="dataDeValidade">Data de Validade</label>
        <input type="date" name="dataDeValidade" id="dataDeValidade" value="<?=$produtos? $produtos->getDataDeValidade():''?>">
    </div>
<button type="submit">Cadastrar</button>
</form>
<<<<<<< HEAD
<a href="lista_produtos.php"><button>Lista</button></a>
<a href="../index.php"><button>Home</button></a> 
=======
<a href="lista_produtos.php">lista</a>   
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
</body>
</html>
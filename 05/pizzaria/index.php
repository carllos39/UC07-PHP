<?php 
require_once 'PizzaDao.php';
require_once 'Pizza.php';
$dao =new PizzaDao();

$pizza=null;//pizza para edição

//Edição de pizza
if(isset($_GET['id'])){
$pizza=$dao->getById($_GET['id']);
}
//Salvar a edição de pizza
if(isset($_POST['id'])){
    $pizza =new Pizza($_POST['id'],$_POST['sabor'],$_POST['tamanho'],$_POST['preco']);
    $dao->update($pizza);
    header("location:index.php");
    exit();
}else if(isset($_POST['sabor'])&& isset($_POST['tamanho'])&& isset($_POST['preco'])){
    $pizza =new Pizza(null,$_POST['sabor'],$_POST['tamanho'],$_POST['preco']);
    $dao->create($pizza);
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pizza</title>
</head>
<body>
    <h1><?=$pizza ?"Editar  Pizza":"Cadastrar pizza"?></h1>
    <form action="index.php" method="post">
        <?php if($pizza): ?>
            <input type="hidden" name="id" id="id" value="<?=$pizza->getId()?>">
        <?php endif; ?>
        <div>
            <label for="sabor">Sabor :</label>
            <input type="text" name="sabor" id="sabor" value="<?=$pizza ? $pizza->getSabor():''?>">
        </div>
               <div>
            <label for="tamanho">Tamanho :</label>
            <input type="text" name="tamanho" id="tamanho" value="<?=$pizza? $pizza->getTamanho():''?>">
        </div>
               <div>
            <label for="preco">Preço :</label>
            <input type="text" name="preco" id="preco" value="<?=$pizza? $pizza->getPreco():''?>">
        </div>
        <input type="submit" value="Cadastrar">
    </form>
  <a href="lista_pizzaria.php">Lista</a>  
</body>
</html>
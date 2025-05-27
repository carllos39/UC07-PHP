<?php 
require_once '../backend/ProdutoDAO.php';
$dao= new ProdutoDAO();

$produto=null;

if(isset($_GET['id'])){
$produto = $dao->getById($_GET['id']);
}
if($_POST){
$id = $_POST['id']?? null;
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$ativo = $_POST['ativo'];
$dataDeCadastro = $_POST['dataDeCadastro'];
$dataDeValidade = $_POST['dataDevalidade']?: null;///?

$produto =new Produto($id,$preco,$ativo,$dataDeCadastro,$dataDeValidade);
if($id){
$dao->update($produto);
}else{
 $dao->create($produto);   
}
header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Produtos</title>
</head>
<body>
    <h2><?= $produto ?"Editar Produtos":"Cadastrar Produtos"?></h2>
    <form action="produto_form.php" method="post">
        <?php if($produto):?>
        <input type="hidden" name="id" id="id"<?=$produto->getId()?>>
        <?php endif; ?>
        <label>Nome :</label>
        <input type="text" name="nome" required step="0.01" value="<?=$produto? $produto->getNome():''?>"><br>
          <label>Preço :</label>
        <input type="number" name="preco" required value="<?=$produto? $produto->getPreco():''?>"><br>
          <label>Ativo:</label>
        <input type="checkbox" name="ativo" required value="<?=$produto && $produto->getAtivo() ?'checked' :''?>"><br>
          <label>Data de Cadastro :</label>
        <input type="date" name="dataDeCadastro"required value="<?=$produto? $produto->getDataDeCadastro():''?>"><br>
          <label>Data de Válidade :</label>
        <input type="date" name="dataDeValidade" required value="<?=$produto? $produto->getDataDeValidade():''?>"><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
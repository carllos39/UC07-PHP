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
$dataDeValidade = $_POST['dataDevalidade'];

}

?>
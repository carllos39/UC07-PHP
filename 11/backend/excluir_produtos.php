<?php
session_start();

if(!isset($_SESSION['token'])){
   header("location:login.php");
   }
   
require_once 'ProdutoDAO.php';

$dao = new ProdutoDAO();

if(isset($_GET['id'])){
$produtos= $dao->getById($_GET['id']);
}
 if($produtos){
    $dao->excluir((int)$_GET['id']);
 }
 header("location:../frontend/lista_produto.php");
?>
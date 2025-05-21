<?php 
require 'PizzaDAO.php';
$id=$_GET['id'];
 $dao = new PizzaDAO();
$dao->delete($id);
header("location:form_pizzaria.php");
?>
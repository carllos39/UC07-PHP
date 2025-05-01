<?php 
$salario =(float) $_GET['salario'];
$inss= $salario * 0.11;
$total=$salario -$inss;
echo "Salario : $salario Desconto :$inss Pagamento total : $total";
?>
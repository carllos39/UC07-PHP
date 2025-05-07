<?php 
$salario =(float) $_GET['salario'];
$vt = $salario * 00.8;
$inss= $salario * 0.11;
$desconto= $inss + $vt;
$total= $salario -$desconto;
echo "Salario : $salario Desconto :$desconto Pagamento total : $total";
?>
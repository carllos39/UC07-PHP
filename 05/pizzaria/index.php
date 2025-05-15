<?php

require 'PizzaDao.php';

$bd = new PizzaDao();
$pizzas = $bd->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pizzas</title>
</head>
<body>
    <h2>Lista de Pizzas</h2>
    <table border="1" cellpading="5">
        <tr><th>ID</th><th>SABOR</th><th>TAMANHO</th><th>PREÇO</th></tr>
        <?php  foreach($pizzas as $pizza) :?>
        <tr>
            <td><?=$pizza->getId()?></td>
            <td><?=$pizza->getSabor()?></td>
            <td><?=$pizza->getTamanho()?></td>
            <td><?=$pizza->getPreco()?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="pizza_form.php">Cadastrar Nova</a>
</body>
</html>

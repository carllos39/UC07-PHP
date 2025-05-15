<?php 
require_once 'PizzaDao.php';
require_once 'Pizza.php';
$dao =new PizzaDao();

if(isset($_POST['sabor']) && isset($_POST['tamanho']) && isset($_POST['preco'])) {
$sabor = $_POST['sabor'];
$tamanho = $_POST['tamanho'];
$preco = $_POST['preco'];

$pizza =new Pizza(null,$sabor,$tamanho,$preco);
$dao->create($pizza);

header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pizza</title>
</head>
<body>
    <h2>Cadastrar nova Pizza</h2>
    <form action="pizza_form.php" method="post">
        <label>Sabor</label>
        <input type="text" name="sabor" required>

        <label>Tamanho</label>
        <input type="text" name="tamanho" required>

        <label>Preco</label>
        <input type="number" name="preco" required>

        <button type="submit">Salvar</button>
    </form>
    <br>
    <a href="index.php">Retornar para a Lista</a>
</body>
</html>
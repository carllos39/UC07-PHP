<?php 
session_start();

if(!isset($_SESSION['token']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina Protegida</h1>
</body>
</html>
<a href="index.php">Voltar</a>
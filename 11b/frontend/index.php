<?php
session_start();
//Ver se esta logado
$isLogged = isset($_SESSION['token']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<h1>Home</h1>
<nav>
    <a href="index.php">Home</a>
    <?php if ($isLogged): ?>
        <a href="usuario.php">Minha Conta</a>
        <a href="../logout.php">Sair</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="cadastro.php">Cadastrar</a>
    <?php endif; ?>
</nav>
<p>Bem-vindo ao sistema!</p>
<?php if($isLogged):?>
<a href="produto_form.php">Produtos</a>
<?php endif ;?>
</body>
</html>
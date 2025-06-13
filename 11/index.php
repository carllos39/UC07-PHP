<?php 
session_start();

$isLogged = isset($_SESSION['token']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Home</h1>
    <p>Bem vindo ao sistema de Produtos!</p>
    <nav>
        <?php if($isLogged):?>
        <a href="usuario.php">Minha Conta</a>
        <a href="logout.php">Sair</a>
         <?php else:?>
        <a href="login.php">Login</a>
         <a href="./frontend/cadastro.php">Cadastro</a>
          <?php endif;?>
    </nav>
    
</body>
</html>
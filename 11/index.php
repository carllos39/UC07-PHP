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
     <link rel="stylesheet" href="./frontend/css/estilo.css">
</head>
<body>
    <h1>Home</h1>
    <h2>Bem vindo ao sistema de Produtos!</h2>
    <nav>
        <?php if($isLogged):?>
        <a href="./frontend/usuario.php"><button>Minha Conta</button></a>
        <a href="./frontend/logout.php"><button>Sair</button></a>
         <?php else:?>
        <a href="./frontend/login.php"><button>Login</button></a>
         <a href="./frontend/cadastro.php"><button>Cadastro</button></a>
          <?php endif;?>
    </nav><br>
    <?php if($isLogged) : ?>
   <a href="./frontend/form_produtos.php"><button>Cadastrar Produtos</button></a>
    <?php endif; ?>  
</body>
</html>
<?php 
session_start();

require_once '../backend/UsuarioDAO.php';
if(!isset($_SESSION['token'])){
header("location:../index.php");
exit;
}
$dao = new UsuarioDAO();
$user= $dao->getByToken($_SESSION['token']);

if(!$user){
<<<<<<< HEAD
$_SESSION['token'] = null;
=======
$_SESSION['token']=null;
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
header("location:login.php");
exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Minha Conta</h1>
    <p>Nome :<?=$user->getNome()?></p>
    <p>Email :<?=$user->getEmail()?></p>
    <a href="../index.php">Voltar</a>
</body>
</html>
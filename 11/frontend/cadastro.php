<?php 
session_start();
require_once '../backend/UsuarioDAO.php';
require_once '../backend/Usuario.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome =filter_input(INPUT_POST,'nome');
    $email =filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $senha =filter_input(INPUT_POST,'senha');
    $confirmaSenha =filter_input(INPUT_POST,'confirmaSenha');

    if($senha !==$confirmaSenha ||!$nome ||!$email ||!$senha){
     $erro="Dados inválidos ou senhas não conferem!";
    }else{
  $dao= new UsuarioDAO();
  if($dao ->getByEmail($email)){
     $erro="Já existe usuario com esse email!";
  }else{
    $senhaHash =password_hash($senha,PASSWORD_DEFAULT);
    $token =bin2hex(random_bytes(25));
    $usuario =new Usuario(null,$nome,$senhaHash,$email,$token);
   if($dao->create($usuario)){
    $_SESSION['token']==$token;
    header("location:..index.php");
    exit;
   }else{
    $erro= "Erro ao cadastrar usuário!";
   }
  }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Cadastro</h1>
    <form action="" method="post">
        <div>
            <label for="nome">Nome :</label>
            <input type="text" name="nome" id="nome">
        </div>
          <div>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email">
        </div>
          <div>
            <label for="senha">Senha :</label>
            <input type="password" name="senha" id="senha">
        </div>
          <div>
            <label for="confirmaSenha">Confirma Senha :</label>
            <input type="password" name="confirmaSenha" id="confirmaSenha">
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Já tem conta?</a>
</body>
</html>
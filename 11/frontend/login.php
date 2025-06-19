<?php 
session_start();
require_once '../backend/UsuarioDAO.php';
if(isset($_SESSION['token'])){
header("location:../index.php");
exit;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST,'senha');

$dao= new UsuarioDAO();
$usuario = $dao->getByEmail($email);

if($usuario && password_verify($senha,$usuario->getSenha())){
$token = bin2hex(random_bytes(25));
$_SESSION['token'] = $token;
$dao->updateToken($usuario->getToken(),$token);
header("location:../index.php");
exit;
}else{
    $rro ="Email ou senha inválida!";
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>login</h1>
    <?php if(isset($rro)) echo"<p style='color : red'>$rro</p>"; ?>
    <form  method="post">
        <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        </div>
         <div>
        <label for="senha">Senha :</label>
        <input type="password" name="senha" id="senha" required>
        </div>
        <button type="submit">Logar</button>
    </form>
</body>
</html>
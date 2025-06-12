<?php 
require_once '../backend/ClienteDAO.php';

if(!isset( $_GET['id'])){
header("location:../index.php");
exit;
}
$dao = new ClienteDAO();

$clientes= $dao->getById($_GET['id']);
if(!$clientes){
    echo "Cliente não encontrado!";
    echo "<a href='../index.php'>Voltar</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes dos Clientes</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h2>Detalhes dos Clientes</h2>
    <ul>
        <li><strong>ID:</strong><?=$clientes->getId()?></li>
        <li><strong>Nome:</strong><?=$clientes->getNome()?></li>
        <li><strong>Cpf:</strong><?=$clientes->getCpf()?></li>
        <li><strong>Ativo:</strong><?=$clientes->getAtivo()?></li>
        <li><strong>Data de Nascimento:</strong><?=$clientes->getDataDeNascimento()?></li>
    </ul>

</body>
</html>
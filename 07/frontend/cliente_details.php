<?php 
require_once '../backend/ClienteDAO.php';
if(!isset( $_GET['id'])){
header("location:../index.php");
exit;
}
$dao = new ClienteDAO();

$clientes= $dao->getById($_GET['id']);
if(!$cliente){
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
        <li><strong>ID:</strong><?=$cliente->getId()?></li>
        <li><strong>Nome:</strong><?=$cliente->getNome()?></li>
        <li><strong>Cpf:</strong><?=$cliente->getCpf?></li>
        <li><strong>Ativo:</strong><?=$cliente->getAtivo?></li>
        <li><strong>Data de Nascimento:</strong><?=$cliente->getDataDeNascimento?></li>
    </ul>

</body>
</html>
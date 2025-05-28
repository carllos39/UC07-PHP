<?php 
require_once '../backend/ClienteDAO.php';

$dao = new ClienteDAO();

$cliente = null;

if(isset($_GET['id'])){
$cliente = $dao->getById($_GET['id']);
}

if($_POST){
    $id=$_POST['id']?? null;
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ativo = $_POST['ativo'];
    $dataDeNascimento = $_POST['dataDeNascimento'];

    $cliente = new Cliente($id,$nome,$cpf,$ativo,$dataDeNascimento);

    if($id){
  $dao->update($cliente);
    }else{
   $dao->create($cliente);    
    }
    header("location:../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cliente</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h2><?=$cliente? "Editar Cliente" :"Cadastrar Cliente"?></h2>
    <form action="cliente_form.php" method="post">
        <?php if($cliente):?>
        <input type="hidden" name="id" value="<?=$cliente->getId()?>">
        <?php endif; ?>
        <div>
            <label for="nome">Nome :</label>
             <input type="text" name="nome" id="nome" required <?=$cliente? $cliente->getNome():''?>>
        </div>
        <div>
            <label for="cpf">Cpf :</label>
             <input type="text" name="cpf" id="cpf" required <?=$cliente? $cliente->getCpf():''?>>
        </div>
        <div>
            <label for="ativo">Ativo :</label>
             <input type="checkbox" name="ativo" id="ativo" required <?=$cliente? $cliente->getAtivo():''?>>
        </div>
        <div>
            <label for="data">Data de Nascimento :</label>
             <input type="date" name="dataDeNascimento" id="dataDeNascimento" required <?=$cliente? $cliente->getDataDeNascimento():''?>>
        </div>
        <input type="submit" value="Salvar">
    </form>
    
</body>
</html>
<?php 
require_once 'ContatoDAO.php';
$dao = new ContatoDAO();

$contato=null; //Contato para edição

//Editar contato
if(isset($_GET['id'])){
$contato=$dao->getById($_GET['id']);
}
//Salvar a edição de contato
if(isset($_POST['id'])){

    $endereco =null;
if(isset($_POST['endereco'])){

    $endereco = $_POST['endereco'];
}
   $contato = new Contato($_POST['id'], $_POST['nome'], $_POST['telefone'],$_POST['email'], $endereco);
    $dao->update($contato);

      header("Location: index.php");

      exit();


} else if(isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email']))
{
    $endereco = null;
    if(isset($_POST['endereco']))
    {
        $endereco = $_POST['endereco'];
    }

    $contato = new Contato(null, $_POST['nome'], $_POST['telefone'], $_POST['email'], $endereco);
    $dao->create($contato);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Contato</title>
</head>
<body>
<h2><?=$contato?"Editar Contato" :"Novo Contato"?></h2>

<form action="contato_form.php" method="post">
    <?php if($contato): ?>
    <input type="hidden" name="id"  value="<?=$contato->getId()?>">
    <?php endif;?>
    <div>
    <label>Nome:</label>
    <input type="text" name="nome" required value="<?= $contato ?$contato->getNome():''?>">
    </div>
    <div>
    <label>Telefone:</label>
    <input type="text" name="telefone" required value="<?=$contato? $contato->getTelefone():''?>">
    </div>
    <div>
    <label>Email:</label>
    <input type="text" name="email" required value="<?=$contato? $contato->getEmail():''?>">
    </div>
    <div>
    <label>Endereco:</label>
    <input type="text" name="endereco" value="<?=$contato?$contato->getEndereco():''?>">
    </div>
    <button type="submit">Salvar</button>
</form>
<a href="index.php">Cancelar</a><br>
</body>
</html>
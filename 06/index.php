<?php 
require_once 'ContatoDAO';
$dao = new ContatoDAO();
$contatos=$dao->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <h2>Lista de Contatos</h2>
    <a href="contato_form.php">Cadastrar Contato</a><br>

    <table border ="1" cellpadding="5">
        <tr>
            <th>ID :</th>
            <th>Nome:</th>
            <th>Ações :</th>
        </tr>
        <?php foreach($contatos as $contato): ?>
          <tr>
           <td><?$contato->getId()?></td>
           <td><?$contato->getNome()?></td>
           <td>
           <a href="#">Detalhes</a>
            <a href="#">Editar</a>
            <a href="#">Excluir</a>
           </td>
          </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>
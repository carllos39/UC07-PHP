

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$clientes=[
    ["nome"=>"Lucimara","cpf"=>"14789445678","cidade"=>"São Paulo"],
    ["nome" =>"Paulo","cpf"=>"148789456","cidade"=>"São Paulo"]

];
?>
    <table border="2">
        <tr>
            <th>Nome :</th>
            <th>Cpf :</th>
            <th>Cidade :</th>
        </tr>
        <?php foreach($clientes as $cliente){ ?>
      <tr>
        <td><?=$cliente['nome']?></td>
        <td><?=$cliente['cpf']?></td>
        <td><?=$cliente['cidade']?></td>
      </tr>
     <?php } ?>
    </table>
</body>
</html>
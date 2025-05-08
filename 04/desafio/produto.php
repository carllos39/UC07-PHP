<?php 
$produto = $_GET['produto'];
$preco = $_GET['preco'];

$produtos[]= [$produto, $preco];


print_r($produtos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista</title>
</head>
<body>
    <table>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
        </tr>
        <?php foreach($produtos as $pro){
            
        }
    </table>
    
</body>
</html>
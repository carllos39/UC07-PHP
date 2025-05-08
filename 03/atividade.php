<ul>
<?php
/*
Crie um array com 4 nomes de alunos e exiba-os em uma lista <ul>
no navegador
*/


$nomes=["Lucimara","Paulo","Renato","Clodoaldo"];

foreach($nomes as $nome){
    echo"<li>$nome </li>";
}
?>

</ul>

<ul>


<table border="1">
<?php
/*
Crie um array multidimensional com 2 clientes, cada um contendo:
- nome
- cpf
- cidade
*/

$clientes=[
    ["nome"=>"Lucimara","cpf"=>"14789445678","cidade"=>"São Paulo"],
    ["nome" =>"Paulo","cpf"=>"148789456","cidade"=>"São Paulo"]

];


foreach($clientes as $cliente){

    echo "
            <tr>
                <td>{$cliente['nome']}</td> .
                <td>{$cliente['cpf']}</td> .
                <td>{$cliente['cidade']}</td> .  
            </tr>
     

     ";
}
?>
</table>



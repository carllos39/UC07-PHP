<?php 
##REPETIÇÃO
//for
for($i=1; $i < 5 ;$i++){
echo "Funciona $i!<br>";

}

$contador = 1;
//while
while($contador < 5){
echo "Contador:$contador<br>";

$contador++;
}

//array
$nomes =["Adenilsa","Carlos","Gustavo","Gabril"];

// for($i=0; $i <  count($nomes) ;$i++){
//     echo "Olá $nomes[$i]!<br>";
    
//     }

foreach($nomes as $n){
    echo "Olá,$n!<br>";
}
?>

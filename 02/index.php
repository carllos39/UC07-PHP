<?php 
$a =10;
$b = 5;

echo "Soma :" .($a + $b);
echo "$a Maior que $b ?" . ($a > $b ? "Sim" : "Não") . "<br>";

$idade = 17;

if($idade >= 18) {
    echo "Maior de idade ,$dade anos!". "<br>";
}else{
    echo "Menor de idade, $dade anos!". "<br>";
}

//SWITCH CASE
$dia = "segunda";
switch($dia){
    case "segunda":
        echo "Inicio da semana";
        break;
        case "sexta":
            echo "Último dia útil";
            break;
            default:
            echo "Dia comum";
    
}

?>
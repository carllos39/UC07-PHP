<?php 

function saudacao() : void{
    echo"Bem vindo ao sistema!" ."<br>";
}

saudacao();

function somar($a,$b){
return $a +$b;
}

echo"Retorno da soma : ". somar(10 ,8) ."<br>";


function subtrair(int $a, int $b){
    return $a - $b;
    }
    
    echo"Retorno da subtração : ". subtrair(10 ,8)."<br>";

    function multiplica(int $a,int $b) : int{
    return $a * $b;
    }
    echo"Retorno da multiplicação: ". multiplica(10 ,8)."<br>";

    function dividi(int $a,int $b) : float|String{
        if($b==0){
        return"Impossível dividir por zero!";
        }
        return $a / $b;
        }
        echo"Retorno da divisão: ". dividi(10 ,8)."<br>";


        function (array $nomes): void {
            foreach($nomes as $n){
                echo"<li>$n</li>";
            }

            $professores=["Celso", "Luana", "Arlindo"];
            echo "<ul>";
            listarNomes($professores);
            echo "</ul>";
        }

      
?>




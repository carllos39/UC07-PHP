<?php 

/*
- Cliente
Propriedades: nome, veiculo, telefone (todos private string)
Construtor que recebe todas as propreidades
Sobrescreva __toString() para visualizarmos os dados
Crie um get para o "nome" e um set para o "telefone"
*/
class Cliente{
   private string $nome; 
   private string $veiculo; 
   private string $telefone; 

   function __construct(string $nome,string $veiculo,string $telefone){
    $this->nome = $nome; 
    $this->veiculo =  $veiculo; 
    $this->telefone = $telefone; 
   }
   
   public function getNome(){
    return $this->nome;
   }
   public function setTelefone(string $novoTelefone): void{
    if(strlen($novoTelefone)==11){
    $this->telefone = $novoTelefone;
    }else{
        echo"Telefone inválido!<br>";
    }
   }
    function __toString()
    {
        return "Nome: $this->nome, Veiculo: $this->veiculo,Telefone :$this->telefone <br>";  
    }
   }
$c1= new Cliente('Carlos','Corolla','12345678');
print_r($c1);

echo $c1;

$c1->setTelefone('11948325592');
print_r($c1);
?>
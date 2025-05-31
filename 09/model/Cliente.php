<?php 
class Cliente implements JsonSerializable{
    private ? int $id;
    private string $nome;
    private string $cpf;
    private bool $ativo;
    private string $dataDeNascimento;

    public function __construct(?int $id,string $nome,string $cpf,bool $ativo,string $dataDeNascimento){
    $this->id = $id;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->ativo = $ativo;
    $this->dataDeNascimento = $dataDeNascimento;

    }

    public function getId():?int{
        return $this->id;
    }
    public function setId(int $id){
         $this->id =$id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $nome){
         $this->nome =$nome;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf(string $cpf){
        
         $this->cpf =$cpf;
    }

    public function getAtivo(){
        return $this->ativo;
    }
    public function setAtivo(bool $ativo){
         $this->ativo =$ativo;
    }

    public function getDataDeNascimento(){
        return $this->dataDeNascimento;
    }
    public function setDataDeNascimento(string  $dataDeNascimento){
         $this->dataDeNascimento = $dataDeNascimento;
    }
      
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'dataDeNascimento' => $this->dataDeNascimento,
            'ativo' => $this->ativo,
        ];
    }
        
    }

?>
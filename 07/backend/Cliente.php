<?php 
class Cliente{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private string $ativo;
    private string $dataDeNascimento;

    public function __construct(int $id,string $nome,string $cpf,string $ativo,string $dataDeNascimento){
    $this->id = $id;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->ativo = $ativo;
    $this->dataDeNascimento = $dataDeNascimento;

    }

    public function getId(){
        return $this->id;
    }
    public function setId(int $id){
         $this->id =$id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome(string $nome){
         $this->id =$nome;
    }
    
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf(string $cpf){
         $this->id =$cpf;
    }

    public function getAtivo(){
        return $this->ativo;
    }
    public function setAtivo(string $ativo){
         $this->id =$ativo;
    }

    public function getDataDeNascimento(){
        return $this->dataDeNascimento;
    }
    public function setDataDeNascimento(string  $dataDeNascimento){
         $this->id =$dataDeNascimento;
    }
        
    }

?>
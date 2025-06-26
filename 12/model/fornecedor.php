<?php 
class fornecedor{
    private ?int $id;
    private string $nome;
    private ?string $cnpj;
    private string $contato;

    public function __construct(?int $id,$nome,$cnpj,$contato)
    {
       $this->id = $id; 
       $this->nome = $nome; 
       $this->cnpj = $cnpj; 
       $this->contato = $contato; 

    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
    public function getContato(){
        return $this->contato;
    }

}

?>
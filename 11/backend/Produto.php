<?php 
class Produto{
    private int $id;
    private string $nome;
    private float $preco;
    private bool $ativo;
    private string $dataDeCadastro;
    private string $dataDeValidade;

    public function __construct(int $id,$nome,$preco,$ativo,$dataDeCadastro,$dataDeValidade){
        
      $this->id = $id;
      $this->nome = $nome;
      $this->preco = $preco;
      $this->ativo = $ativo;
      $this->dataDeCadastro = $dataDeCadastro;
      $this->dataDeValidade = $dataDeValidade;
       
    }

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getAtivo(){
        return $this->ativo;
    }
    public function getDataDeCadastro(){
        return $this->dataDeCadastro;
    }
    public function getDataDeValidade(){
        return $this->dataDeValidade;
    }

}

?>
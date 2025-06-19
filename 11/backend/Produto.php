<?php 
<<<<<<< HEAD
class Produto implements JsonSerializable{
=======
class Produto{
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
    private ?int $id;
    private string $nome;
    private float $preco;
    private ?bool $ativo;
    private string $dataDeCadastro;
    private string $dataDeValidade;

<<<<<<< HEAD
    public function __construct(?int $id,$nome, float $preco,?bool $ativo,$dataDeCadastro,$dataDeValidade){
=======
    public function __construct(?int $id,$nome,$preco,$ativo,$dataDeCadastro,$dataDeValidade){
>>>>>>> d378a6607e2ec3a51886ccd5d81b5cd2b9cf28de
        
      $this->id = $id;
      $this->nome = $nome;
      $this->preco = $preco;
      $this->ativo = $ativo;
      $this->dataDeCadastro = $dataDeCadastro;
      $this->dataDeValidade = $dataDeValidade;
       
    }
  //Metoddos GET
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
    //Metodos SET

    public function setId(int $id){
        $this->id = $id;
    }
        public function setNome(string $nome){
        $this->nome = $nome;
    }
        public function setPreco(float $preco){
        $this->preco = $preco;
    }
        public function setAtivo(bool $ativo){
        $this->ativo = $ativo;
    }
        public function setDataDeCadastro(string $dataDeCadastro){
        $this->dataDeCadastro = $dataDeCadastro;
    }
        public function setDataDeValidade(string $dataDeValidade){
        $this->dataDeValidade = $dataDeValidade;
    }

    public  function jsonSerialize(): mixed
    {
        return[
          'id' => $this->id,
          'nome' => $this->nome,
          'preco' => $this->preco,
          'ativo' => $this->ativo,
          'dataDeCadastro' => $this->dataDeCadastro,
          'dataDeValidade' => $this->dataDeValidade,
        ];
    }

}

?>
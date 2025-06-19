<?php
class Contato
{
    private ?int $id;
    private string $nome;
    private string $email;
    private string $telefone;
    private string $endereco;
    private string $bairro;
    private string $cidade;
    private string $estado;


    public function __construct(?int $id, $nome, $email, $telefone, $endereco, $bairro, $cidade, $estado)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
//GET
    public function getId(){
        return $this->id;
    }
        public function getNome(){
        return $this->nome;
    }
        public function getEmail(){
        return $this->email;
    }
        public function getTelefone(){
        return $this->telefone;
    }
        public function getEndereco(){
        return $this->endereco;
    }
        public function getBairro(){
        return $this->bairro;
    }
        public function getCidade(){
        return $this->cidade;
    }
        public function getEstado(){
        return $this->estado;
    }
    //POST
       public function setId(int $id){
     $this->id =$id;
    }
        public function setNome(string $nome){
         $this->nome= $nome;
    }
        public function setEmail(string $email){
         $this->email=$email;
    }
        public function setTelefone(string $telefone){
         $this->telefone = $telefone;
    }
        public function setEndereco(string $endereco){
         $this->endereco =$endereco;
    }
        public function setBairro(string $bairro){
         $this->bairro= $bairro;
    }
        public function setCidade(string $cidade){
         $this->cidade = $cidade;
    }
        public function setEstado(string $estado){
        $this->estado =$estado;
    }
}

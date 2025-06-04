<?php
require_once '../Database.php';
require_once  '../model/Cliente.php';

class ProdutoDAO{

    private PDO $bd;

    public function __construct(){
        $this->bd = Database::getInstance();
    }
    
    public function getAll(){
        $sql="SELECT * FROM produtos";
        $produtos=[];
        $stmt =$this->bd->query($sql);
       while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
        $produtos[] =new Produto(
            $row['id'],
            $row['nome'],
            $row['preco'],
            $row['ativo'],
            $row['dataDeCadastro'],
            $row['dataDeValidade']
    
        );
    
        }
        return $produtos;
        }

        public function getById($id) :Produto{
            $sql="SELECT * FROM produtos WHERE id=:id";
        
            $stmt =$this->db->query($sql);
          return $row =$stmt->fetch(PDO::FETCH_ASSOC);
            $row ?new Produto(
                $row['id'],
                $row['nome'],
                $row['preco'],
                $row['ativo'],
                $row['dataDeCadastro'],
                $row['dataDeValidade']
        
            ):null;
        
            }
           public function create(Produto $produtos){
          $sql="INSERT INTO produtos(nome,preco,ativo,dataDeCadastro,dataDeValidade)
          VALUES(:nome,:preco,:ativo,:dataDeCadastro,:dataDeValidade)";
          $stmt =$this->bd->prepare($sql);
          $stmt->execute([
            ':nome'=>$produtos->getNome(),
            ':preco'=>$produtos->getPreco(),
            ':ativo'=>$produtos->getAtivo(),
            ':dataDeCadastro'=>$produtos->getDataDeCadastro(),
            ':dataDeValidade'=>$produtos->getDataDeValidade()
          ]);
           }
           public function update(Produto $produtos){
            $sql="UPDATE produtos SET nome=:nome,preco=:preco,ativo=:ativo,dataDeCadastro=:dataDeCadastro,dataDeValidade=:dataDeValidade WHERE id=:id";
        
            $stmt =$this->bd->prepare($sql);
            $stmt->execute([
               ':id'=>$produtos->getId(), 
              ':nome'=>$produtos->getNome(),
              ':preco'=>$produtos->getPreco(),
              ':ativo'=>$produtos->getAtivo(),
              ':dataDeCadastro'=>$produtos->getDataDeCadastro(),
              ':dataDeValidade'=>$produtos->getDataDeValidade()
            ]);
             }
             public function delete( $id){
                $sql="DELETE FROM produtos WHERE id=:id ";
                $stmt =$this->bd->prepare($sql);
                $stmt->execute([':id'=>$id ]);
                 }
            }



    
        
    


?>
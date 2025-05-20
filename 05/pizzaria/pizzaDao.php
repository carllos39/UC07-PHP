<?php 
require 'Conexao.php';
require 'Pizza.php';


class PizzaDAO
{
    private $bd;

    
    
       public function __construct(){
       $this->bd = Conexao::getBd();
        
    }
    
        public function getAll()
        {        
            $stmt = $this->bd->query("SELECT * FROM pizza");
            $pizzas = [];
    
            while ($row = $stmt->fetch((PDO::FETCH_ASSOC))) {
                $pizzas[] = new Pizza(
                    $row['id'],
                    $row['sabor'],
                    $row['tamanho'],
                    $row['preco']
                );
            }
            return $pizzas;
        }

        public function create(Pizza $pizza) {
            $stmt = $this->bd->prepare("INSERT INTO pizza (sabor, tamanho, preco)
                VALUES (:sabor, :tamanho, :preco)");
    
            $sabor = $pizza->getSabor();
            $tamanho = $pizza->getTamanho();
            $preco = $pizza->getPreco();
    
            $stmt->bindParam(':sabor', $sabor);
            $stmt->bindParam(':tamanho', $tamanho );
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();
        }
        public function delete($id){
            try{
       $sql="DELETE FROM pizza WHERE id=:id";
       $stmt = $this->db->prepare($sql);
       $stmt->execute([':id'=>$id]);
       return true;
            }catch(PDOException $e){
   error_log($e->getMessage());
            }
        }
    }





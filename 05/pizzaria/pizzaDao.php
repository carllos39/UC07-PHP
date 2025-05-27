<?php
require_once 'Conexao.php';
require_once 'Pizza.php';


class PizzaDAO
{
    private $bd;



    public function __construct()
    {
        $this->bd = Conexao::getBd();
    }

    public function getAll()
    {
        $stmt = $this->bd->query("SELECT * FROM pizza");
        $pizzas = [];

        while ($pizza = $stmt->fetch((PDO::FETCH_ASSOC))) {
            $pizzas[] = new Pizza(
                $pizza['id'],
                $pizza['sabor'],
                $pizza['tamanho'],
                $pizza['preco']
            );
        }
        return $pizzas;
    }

    public function getById($id)
    {
        
            $sql = "SELECT * FROM pizza WHERE id = :id";
            $stmt = $this->bd->prepare($sql);

            $stmt->execute([':id' => $id]);
            $pizza = $stmt->fetch(PDO::FETCH_ASSOC);
            return  $pizza = new Pizza(
                $pizza['id'],
                $pizza['sabor'],
                $pizza['tamanho'],
                $pizza['preco']
            );
    }

    public function create(Pizza $pizza)
    {
        $stmt = $this->bd->prepare("INSERT INTO pizza (sabor, tamanho, preco)
                VALUES (:sabor, :tamanho, :preco)");

        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
    }
    public function update(Pizza $pizza)
    {
        $stmt = $this->bd->prepare("UPDATE pizza SET sabor=:sabor, tamanho=:tamanho, preco=:preco WHERE id=:id");

        $id = $pizza->getId();
        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();
     
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);
    
        $stmt->execute();
    }
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM pizza WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }
}

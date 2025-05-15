<?php
require 'Conexao.php';
require 'Pizza.php';

class PizzaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getBd();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizza = [];
        while ($row = $stmt->fetch((PDO::FETCH_ASSOC))) {
            $pizza[] = new Pizza(
                $row['id'],
                $row['sabor'],
                $row['tamanho'],
                $row['preco']
            );
        }
        return $pizza;
    }
    public function create(Pizza $pizza)
    {
        $stmt = $this->db->prepare("INSERT INTO pizza(sabor,tamanho,preco)
        VALUES(:sabor,:tamanho,:preco)");

        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam('sabor', $sabor);
        $stmt->bindParam('tamanho', $tamanho);
        $stmt->bindParam('preco', $preco);
        $stmt-> execute();
    }
}

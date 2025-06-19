<?php 
require_once '../model/Contato.php.php';
require_once '../core/Database.php';

class ContatoDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query("SELECT * FROM contato");
        $contatos= [];

        while($row = $resultadoDoBanco->fetch(PDO::FETCH_ASSOC)) {
            $contatos[] =  new contato(
                $row['id'],
                $row['nome'],
                $row['email'],
                $row['telefone'],
                $row['endereco'],
                $row['bairro'],
                $row['cidade'],
                $row['estado']
            );
        }

        return $contatos;
    }

    public function getById(int $id): ?Contato
    {
        $sql = "SELECT * FROM contato WHERE id = :id";

        $stmt = $this->db->prepare($sql);        
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Contato(
                $row['id'],
                $row['nome'],
                $row['email'],
                $row['telefone'],
                $row['endereco'],
                $row['bairro'],
                $row['cidade'],
                $row['estado']
        ) : null;
    }

    public function create(Contato $contato): void 
    {
        $sql = "INSERT INTO contato (nome, email, telefone, endereco, bairro,cidade,estado) VALUES
                (:nome, :email, :telefone, :endereco, :bairro,:cidade,:estado)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $contato->getNome(),            
            ':email' => $contato->getEmail(),            
            ':telefone' => $contato->getTelefone(),            
            ':endereco' => $contato->getEndereco(),            
            ':bairro' => $contato->getBairro(),
             ':cidade' => $contato->getCidade(),
            ':estado' => $contato->getEstado()
            

        ]);
    }



    public function update(Contato $contato): void
    {
        $sql = "UPDATE contato SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco, bairro = :bairro,cidade=:cidade,estado=:estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $contato->getId(),
            ':nome' => $contato->getNome(),            
                ':email' => $contato->getEmail(),            
            ':telefone' => $contato->getTelefone(),            
            ':endereco' => $contato->getEndereco(),            
            ':bairro' => $contato->getBairro(),
             ':cidade' => $contato->getCidade(),
            ':estado' => $contato->getEstado()
        ]);
    }    

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM contato WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>
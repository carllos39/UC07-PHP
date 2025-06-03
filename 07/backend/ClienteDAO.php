<?php 
require_once 'Produto.php';
require_once 'Database.php';

class ClienteDAO{
    private $db;

    public function __construct()
    {
     $this->db= Database::getInstance();  
    }

    public function getAll(){
        $sql="SELECT*FROM clientes";
        $clientes=[];
        $stmt=$this->db->query($sql);
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $clientes[] = new Cliente(
                    $row['id'],
                    $row['nome'],
                    $row['cpf'],
                    $row['ativo'],
                    $row['dataDeNascimento']

            );
        }
        return $clientes;
    }

    public function getById(int $id): ? Cliente{
        $sql="SELECT*FROM clientes WHERE id=:id";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([':id'=> $id]);
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
           return $row?  new Cliente(
                    $row['id'],
                    $row['nome'],
                    $row['cpf'],
                    $row['ativo'],
                    $row['dataDeNascimento']

            ):null;
        }

        public function create(Cliente $clientes){
            $sql="INSERT INTO clientes(nome,cpf,ativo,dataDeNascimento) VALUES(:nome,:cpf,:ativo,:dataDeNascimento)";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([
                ':nome'=>$clientes->getNome(),
                ':cpf'=>$clientes->getCpf(),
                ':ativo'=>$clientes->getAtivo(),
                ':dataDeNascimento'=>$clientes->getDataDeNascimento()
            ]);
        }

        public function update(Cliente $clientes){
            $sql="UPDATE clientes SET nome=:nome,cpf=:cpf,ativo=:ativo,dataDeNascimento=:dataDeNascimento WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([
                ':id'=>$clientes->getId(),
                ':nome'=>$clientes->getNome(),
                ':cpf'=>$clientes->getCpf(),
                ':ativo'=>$clientes->getAtivo(),
                ':dataDeNascimento'=>$clientes->getDataDeNascimento()
            ]);
        }
        public function delete( $id){
            $sql="DELETE FROM clientes  WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt ->execute([':id'=> $id ]);
        }
        
    }
?>
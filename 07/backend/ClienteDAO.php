<?php 
require_once './Database.php.php';

class ClienteDAO{
    private $bd;

    public function __construct()
    {
     $this->bd= Database::getInstance();  
    }

    public function getAll(){
        $sql="SELECT*FROM cliente";
        $clientes=[];
        $stmt=$this->bd->query($sql);
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

    public function getById(): ? Cliente{
        $sql="SELECT*FROM cliente WHERE id=:id";
        $stmt=$this->bd->prepare($sql);
        return $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $row?  new Cliente(
                    $row['id'],
                    $row['nome'],
                    $row['cpf'],
                    $row['ativo'],
                    $row['dataDeNascimento']

            ):null;
        }

        public function create(Cliente $cliente){
            $sql="INSERT INTO cliente(nome,cpf,ativo,dataDeNascimento) VALUE(:nome,:cpf,:ativo,:dataDeNascimento)";
            $stmt=$this->bd->prepare($sql);
            $stmt ->execute([
                'nome'=>$cliente->getNome(),
                'cpf'=>$cliente->getCpf(),
                'ativo'=>$cliente->getAtivo(),
                'dataDeNascimento'=>$cliente->getDataDeNascimento(),
            ]);
        }

        public function updater(Cliente $cliente){
            $sql="UPDATE cliente SET nome=:nome,cpf=:cpf,ativo=:ativo,dataDeNascimento=:dataDeNascimento WHERE id=:id";
            $stmt=$this->bd->prepare($sql);
            $stmt -> execute([
                'id'=>$cliente->getId(),
                'nome'=>$cliente->getNome(),
                'cpf'=>$cliente->getCpf(),
                'ativo'=>$cliente->getAtivo(),
                'dataDeNascimento'=>$cliente->getDataDeNascimento(),
            ]);
        }
        public function excluir( $id){
            $sql="DELETE FROM cliente  WHERE id=:id";
            $stmt=$this->bd->prepare($sql);
            $stmt -> execute(['id'=>$id, ]);
        }
        
    }
?>
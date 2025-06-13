<?php 
require_once '../backend/UsuarioDAO.php';
require_once '../Database.php';

class UsuarioDAO{
    private $bd;

    public function __construct()
    {
       $this-> bd = Database::getInstance() ;
    }
    public function create(Usuario $usuario){
    $sql="INSERT INTO usuario(nome,email,senha,token)VALUES(:nome,:email,:senha,:token)";
    $stmt=$this->bd->prepare($sql);
    $stmt->execute([':nome'=>$usuario->getNome(),
                     ':email'=>$usuario->getEmail(),
                     ':senha'=>$usuario->getSenha(),
                     ':token'=>$usuario->getToken()
    ]);
    }
    public function updateToken( $id,$token){
    $sql="UPDATE usuario SET token=:token WHERE id=:id";
    $stmt=$this->bd->prepare($sql);
         
    $stmt->execute([
                    ':id'=>$id,
                     ':token'=>$token
    ]);
    }

    public function getByEmail($email):?Usuario{
        $sql="SELECT*FROM usuario WHERE email=:email";
        $stmt=$this->bd->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?new Usuario($row['id'],$row['nome'],$row['email'],$row['senha'],$row['token']):null; 

        }
         public function getByToken($token):?Usuario{
        $sql="SELECT*FROM usuario WHERE token=:token";
        $stmt=$this->bd->prepare($sql);
        $stmt->execute([':token'=>$token]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?new Usuario($row['id'],$row['nome'],$row['email'],$row['senha'],$row['token']):null; 

        }
    
    }


?>
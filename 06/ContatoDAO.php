<?php 
require_once 'Database.php';
require_once 'Contato.php';
 class ContatoDAO{
private $db;

public function __construct()
{
  $this->db = Database::getInstance(); //Recebe uma instancia do banco de dados  
}

public function getAll(){
    $sql="SELECT* FROM contato";
    $contato=[];
   $stmt = $this->db->query($sql);

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  
  $contato[] = new Contato($row['id'],$row['nome'],$row['telefone'],$row['email'],$row['endereco']);
   }
   return $contato;
}
public function getById(int $id): ?Contato
{

  $stmt = $this->db->prepare("SELECT * FROM contato WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row ? new Contato($row['id'], $row['nome'], $row['telefone'], $row['email'], $row['endereco']) :null;     
}
public function create(Contato $contato){
 $sql="INSERT INTO contato(nome,telefone,email,endereco) VALUES(:nome,:telefone,:email,:endereco)";
 $stmt= $this->db->prepare($sql);
 $nome = $contato->getNome();
 $telefone = $contato->getTelefone();
 $email = $contato->getEmail();
 $endereco = $contato->getEndereco();
 $stmt->bindParam(':nome',$nome);
 $stmt->bindParam(':telefone',$telefone);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':endereco',$endereco);
 $stmt->execute();
}
public function update(Contato $contato){
 $sql="UPDATE contato SET nome=:nome,telefone=:telefone,email=:email,endereco=:endereco WHERE id=:id";
 $stmt= $this->db->prepare($sql);
  $id = $contato->getId();
 $nome = $contato->getNome();
 $telefone = $contato->getTelefone();
 $email = $contato->getEmail();
 $endereco = $contato->getEndereco();
  $stmt->bindParam(':id',$id);
 $stmt->bindParam(':nome',$nome);
 $stmt->bindParam(':telefone',$telefone);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':endereco',$endereco);
 $stmt->execute();
}

public function delete(int $id): void
{
    $stmt = $this->db->prepare("DELETE FROM contato WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

 }
//  // TESTE DE CLASSE
// $cont1 = new Contato(null, "Batman");
// $dao = new ContatoDAO();

// $dao->create($cont1);
?>
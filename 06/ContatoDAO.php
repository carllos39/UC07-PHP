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
    $sql="SELECT* FROM contatos";
    $contatos=[];
   $stmt = $this->db->query($sql);

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  
  $contatos[] = new Contato($row['id'],$row['nome'],$row['telefone'],$row['email'],$row['endereco']);
   }
   return $contatos;
}
public function getById(int $id): ?Contato
{

  $stmt = $this->db->prepare("SELECT * FROM agenda.contatos WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row ? new Contato($row['id'], $row['nome'], $row['telefone'], $row['email'], $row['endereco']) :null;     
}
public function create(Contato $contatos){
 $sql="INSERT INTO contatos(nome,telefone,email,endereco) VALUES(:nome,:telefone,:email,:endereco)";
 $stmt= $this->db->prepare($sql);
 $nome = $contatos->getNome();
 $telefone = $contatos->getTelefone();
 $email = $contatos->getEmail();
 $endereco = $contatos->getEndereco();
 $stmt->bindParam(':nome',$nome);
 $stmt->bindParam(':telefone',$telefone);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':endereco',$endereco);
 $stmt->execute();
}
public function update(Contato $contatos){
  $sql="UPDATE contatos SET nome=:nome,telefone=:telefone,email=:email,endereco=:endereco WHERE id=:id";
  $stmt =$this->db->prepare($sql);

  $id = $contatos->getId();
  $nome = $contatos->getNome();
  $telefone = $contatos->getTelefone();
  $email = $contatos->getEmail();
  $endereco = $contatos->getEndereco();
  
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':endereco', $endereco);

  $stmt->execute();
}
public function delete(int $id): void
{
    $stmt = $this->db->prepare("DELETE FROM contatos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

 }
//  // TESTE DE CLASSE
// $cont1 = new Contato(null, "Batman");
// $dao = new ContatoDAO();

// $dao->create($cont1);
?>
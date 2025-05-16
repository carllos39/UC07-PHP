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
  
  $contatos[] = new Contato($row['id'],$row['nome']);
   }
   return $contatos;
}
public function create(Contato $contatos){
 $sql="INSERT INTO contatos(nome) VALUES(:nome)";
 $stmt= $this->db->prepare($sql);
 $nome = $contatos->getNome();
 $stmt->bindParam(':nome',$nome);
 $stmt->execute();
}

 }


//  // TESTE DE CLASSE
// $cont1 = new Contato(null, "Batman");
// $dao = new ContatoDAO();

// $dao->create($cont1);
?>
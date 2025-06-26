<?php 
class Cidade{
public $id;
public $nome;

public function __construct($id,$nome)
{
   $this->id=$id; 
   $this->nome =$nome; 
}
}

class Estado{
    public $id;
    public $uf;
    
    public function __construct($id,$uf)
    {
       $this->id=$id; 
       $this->uf = $uf; 
    }    
}
$bahia= new Estado(17,"BA");
$minas= new Estado(22,"MG");


?>
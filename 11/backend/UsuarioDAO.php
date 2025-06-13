<?php 
require_once '../backend/UsuarioDAO.php';
require_once '../Database.php';

class UsuarioDAO{
    private $bd;

    public function __construct()
    {
       $this-> bd = Database::getInstance() ;
    }
}
?>
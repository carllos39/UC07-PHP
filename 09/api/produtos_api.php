<?php

header('Content-Type: application/json');
require_once '../dao/ProdutoDAO.php';

$dao = new ProdutoDAO();

$action = $_GET['action'] ?? null;
$id= isset($_GET['id']) ? $_GET['id']: null;
$inputBody = json_decode(file_get_contents('php://input'), true);


switch ($action){

    case 'listar'://Get
    echo json_encode($dao->getAll());
      break; 
    case 'buscar':
        if($id){
      echo json_encode("chamou o buscar passou o ID {$id}" );
      $produto= $dao->getById($id);
      if($produto){
        echo json_encode($produto);
    }else{
        http_response_code(404);
        echo json_encode(["error" => "Cliente não encontrado!"]); 
    }   
    }else{
        http_response_code(400); 
        echo json_encode(["error"=> "Você não passou o  ID "]);    
    }
  break;
      
        }
    
?>
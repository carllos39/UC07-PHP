<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origen:*');
header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTION');
header('Access-Control-Allow-Headers:Content-Type');

if($_SERVER['REQUEST_METHOD']=='OPTIONS'){
    exit;
}

require_once '../backend/ProdutoDAO.php';

$dao = new ProdutoDAO();


$action = $_GET['action']?? null;

$id= isset($_GET['id'])? $_GET['id']:null;

$inputBody = json_decode(file_get_contents('php://input'),true);

switch($action){
 case 'listar':
    echo json_encode($dao->getAll());
    break;

    case'buscar':
        if($id){
echo json_encode("Você chamou o buscar,passou o ID:{$id}");
$produtos =$dao->getById($id);
if($produtos){
echo json_encode($produtos);
}else{
    http_response_code(404);
    echo json_encode(['erro'=>'produtonão encontrado!']);
}
        }else{
     http_response_code(400);
    echo json_encode(['erro'=>'Você não passou o ID']);   
        }
        break;
         case'cadastrar':
        if($_SERVER['REQUEST_METHOD']=='POST' && $inputBody){
            $produtos =new Produto(null,$inputBody['nome'],$inputBody['preco'],$inputBody['ativo'],$inputBody['dataDeCadastro'],$inputBody['dataDeValidade']);
            if($dao->create($produtos)){
                    http_response_code(201);
          echo json_encode(['sucess'=>'Produtos Cadastrados']);  
         }else{
    http_response_code(500);
    echo json_encode(['erro'=>'produto não encontrado!']);
        }
        }else{
     http_response_code(400);
    echo json_encode(['erro'=>'ID não fornecido ou método incorreto!']);   
        }
        break;

             case'alterar':
        if($_SERVER['REQUEST_METHOD']=='POST' && $inputBody && $id){
            $produtos =new Produto(null,$inputBody['nome'],$inputBody['preco'],$inputBody['ativo'],$inputBody['dataDeCadastro'],$inputBody['dataDeValidade']);
            if($dao->update($produtos)){
                    http_response_code(201);
          echo json_encode(['sucess'=>'Produtos Alterado']);  
         }else{
    http_response_code(500);
    echo json_encode(['erro'=>'produto não alterado!']);
        }
        }else{
     http_response_code(400);
    echo json_encode(['erro'=>'ID não fornecido ou método incorreto!']);   
        }
        break;
        case'cadastrar':
        if($_SERVER['REQUEST_METHOD']=='DELETE'){
       
            if($dao->excluir($produtos)){
                    http_response_code(201);
          echo json_encode(['sucess'=>'Produtos excluido com sucesso']);  
         }else{
    http_response_code(500);
    echo json_encode(['erro'=>'produto não excluido!']);
        }
        }else{
     http_response_code(400);
    echo json_encode(['erro'=>'ID não fornecido ou método incorreto!']);   
        }
        break;

    default:
    http_response_code(400);
    echo json_encode(['$erro'=>'Ação inválida,informar action!']);
}
?>

<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

require_once '../dao/ProdutoDAO.php';

$dao = new ProdutoDAO();

$action= $_GET['action']?? null;
$id= isset($_GET['id']) ? $_GET['id']: null;
$inputBody = json_decode(file_get_contents('php://input'),true);
switch($action){
    case 'listar':
        echo json_encode($dao->getAll());
        break;
    case 'buscar':
   if($id){
        echo json_encode("chamou o buscar, passou o ID:{$id}");
        $produtos =$dao->getById($id);
        if($produtos){
            echo json_encode($produtos);
        }else{
            http_response_code(404);
            echo json_encode(['error'=>'Produto não encontrado!']);
        }
        }else{
            http_response_code(400);
            echo json_encode(['error'=>'Você não passou o ID']);
        }
        break;
    case 'cadastrar':
        if($_SERVER['REQUEST_METHOD']=='POST' && $inputBody){
            $produtos = new Produto(null,$inputBody['nome'],$inputBody['preco'],$inputBody['ativo'],
            $inputBody['dataDeCadastro'],$inputBody['dataDeValidade']);
            if($dao->create($produtos)){
                http_response_code(201);
               echo json_encode(['success'=>'Produto cadastrado com sucesso!']);
            }else{
                 http_response_code(500);
               echo json_encode(['error'=>'Produto não cadastrou!']);   
            }
   
        }else{
                http_response_code(400);
               echo json_encode(['error'=>'Id não fornecido ou método incorreto!']);
        }
        break;
      case 'alterar':
         if($_SERVER['REQUEST_METHOD']=='PUT' && $inputBody && $id){
            $produtos = new Produto($id,$inputBody['nome'],$inputBody['preco'],$inputBody['ativo'],
            $inputBody['dataDeCadastro'],$inputBody['dataDeValidade']);
            if($dao->update($produtos)){
                http_response_code(201);
               echo json_encode(['success'=>'Produto alterado com sucesso!']);
            }else{
                 http_response_code(500);
               echo json_encode(['error'=>'Produto não alterado!']);   
            }
   
        }else{
                http_response_code(400);
               echo json_encode(['error'=>'Id não fornecido ou método incorreto!']);
        }
        break;
          case 'excluir':
           if($_SERVER['REQUEST_METHOD']=='DELETE'){
            if($dao->delete($produtos)){
                http_response_code(201);
               echo json_encode(['seccess'=>'Produto exclido com sucesso!']);
            }else{
                 http_response_code(500);
               echo json_encode(['error'=>'Produto não excluido!']);   
            }
   
        }else{
                http_response_code(400);
               echo json_encode(['error'=>'Id não fornecido ou método incorreto!']);
        }
        break;
        default:
        http_response_code(400);
        echo json_encode(['error'=>'Ação inválida, informar action!']);        
}
?>
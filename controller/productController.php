<?php
require_once ("abstractController.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/job/model/produto.class.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/job/repository/productRepository.php");

class ProductController extends AbstractController{

    private $product;
   
    function __construct(Product $product){

       $this->product = $product;  
       
    }


    function insert(){

       

        $error = array();

        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $this->product->getImage()["type"])){
            $error[1] = "Não é uma imagem.";
            } 
    
        if (count($error) == 0) {
            $img = $this->product->getImage();
            $nome_imagem =  $img["name"];
            $caminho_imagem = $_SERVER["DOCUMENT_ROOT"]."/job/Imagens/" . $nome_imagem;
        

            try {
                move_uploaded_file($img["tmp_name"], $caminho_imagem);
            }catch(Exception $e){
                echo $e;
            }
        }

        

        $productRepository = new ProductRepository();

        $productRepository->insert($this->product);

        

         
    }

    function delete(){
        $productRepository = new ProductRepository();
        $productRepository->delete($this->product);
    }

    function update(){

        $error = array();

        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $this->product->getImage()["type"])){
            $error[1] = "Não é uma imagem.";
            } 
    
        if (count($error) == 0) {
            $img = $this->product->getImage(); 
            $nome_imagem =  $img["name"];
            $caminho_imagem = $_SERVER["DOCUMENT_ROOT"]."/job/Imagens/" . $nome_imagem;
            
            echo $nome_imagem;

            try {
                move_uploaded_file($img["tmp_name"], $caminho_imagem);
            }catch(Exception $e){
                echo $e;
            }
        }

        $productRepository = new ProductRepository();
        $productRepository->update($this->product);

        
    }
    function listProduct(){
        
        $productRepository = new ProductRepository();

        return $productRepository->listProduct();
    }
    function getProductById(){
        $productRepository = new ProductRepository();
        return $productRepository->getProductById($this->product);   
    }


}


if(isset($_GET['id_produto_del'])){
                        $product = new Product();
                        $product->setId($_GET['id_produto_del']);
                        $productRepository = new ProductRepository();
                        $productRepository->delete($product);
                     }

else if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_FILES['imagem'])){


    $product = new Product();
    $product->setName($_POST['nome']);
    $product->setDescription($_POST['descricao']);
    $product->setPrice($_POST['preco']);
    $product->setImage($_FILES['imagem']);

    if(isset($_POST['id_produto'])){

        $product->setId($_POST['id_produto']);
        //echo $_POST['id_produto'];
        $productController = new ProductController($product); 
        $productController->update();
       
    }else{

        $productController = new ProductController($product); 
        $productController->insert();
    }
 
}

?>
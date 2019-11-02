<?php

require_once ($_SERVER["DOCUMENT_ROOT"]."/job/database/db.php"); 
require_once ($_SERVER["DOCUMENT_ROOT"]."/job/model/produto.class.php");

class ProductRepository{

    

    function insert(Product $product){

        $query = "INSERT INTO produto(nome, descricao, preco, imagem) VALUES('".$product->getName()."', '".$product->getDescription()."', '".$product->getPrice()."', '".$product->getImage()."')";
        $sql = mysqli_query(Database::getConnection(), $query) or die(Database::getConnection()->error);
        
        if($sql){
            header("location: ../index.php");
        }else{
            header("location: index2.php");
        }
    }
    function delete(Product $product){
        $id = $product->getId();
        var_dump($product);
        $query = "DELETE FROM produto WHERE id_produto = $id";
        $sql = mysqli_query(Database::getConnection(), $query) or die("Erro na conexão: ".Database::getConnection()->error);

        if($sql){
            header("location: ../index.php");
        }else{
            header("location: index2.php");
        }
        
    }
    function update(Product $product){
        
        // $query = "UPDATE produto SET nome = ".$product->getName().", descricao = '".$product->getDescription()."', preco = ".$product->getPrice().", imagem = '".$product->getImage()."' WHERE id_produto = ".$product->getId()."";
        $query = "UPDATE produto SET nome  = ?, descricao = ?, preco = ? , imagem = ? WHERE id_produto = ?";


        $stmt = Database::getConnection()->prepare($query);
        $stmt->bind_param('ssdsi',$product->getName(),
                                  $product->getDescription(),
                                  $product->getPrice(),
                                  $product->getImage()["name"],
                                  $product->getId());

        if($stmt->execute()){
            header("location: ../index.php");
        }else{
            header("location: ../index2.php");
        }                          
                            
            
        
    }
    function listProduct(){
        
        $query = "SELECT * FROM produto order by nome";
		$result = Database::getConnection()->query($query);

        return $result;
    }

    function getProductById(Product $product){

        $query = "SELECT * FROM produto where id_produto = ".$product->getId()."";
        $result = Database::getConnection()->query($query);

        return $result;
    }
}


?>
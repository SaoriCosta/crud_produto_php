<?php 
include_once 'header.php';
include_once "database/db.php";
include_once "controller/productController.php";
include_once "model/produto.class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastra Produto</title>

</head>
<body>

    <div class="container">


<?php 

if(isset($_GET['msg'])){

    echo $_GET['msg'];
}

?>

<?php    

if(isset($_GET['id_produto_up'])){

        $id_produto = $_GET['id_produto_up'];
        $product = new Product();
        $product->setId($id_produto);
        $productController = new ProductController($product);
        $result = $productController->getProductById();    
?>
  <form name="produto" method="post" action="controller/productController.php" enctype="multipart/form-data">

<?php while($produto = mysqli_fetch_array($result)) {?>

<br>
<div class="row">
    <div class="col-md-6">

<h3 class="text-center">Editar Produto</h3>

        <div class="form-group">
        <input  type="hidden" name="id_produto" id="id_produto" value="<?php echo $produto['id_produto']; ?>" />
        </div>
      </div>
    </div>
  
  <div class="row">
    <div class="col-md-6">
         <div class="form-group">
        <label for="nome">Nome</label>
        <input class="form-control" name="nome" type="text" id="nome" value="<?php echo $produto['nome']; ?>" />
    </div>
      </div>
    </div>
      

  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label for="descricao">Descrição</label>
        <input class="form-control" name="descricao" type="text" id="descricao" value="<?php echo $produto['descricao']; ?>"/>
    </div>
      </div>
    </div>


 <div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label for="preco">Preço</label>
        <input class="form-control" name="preco" type="number" step="any" min="0" id="preco" value="<?php echo $produto['preco']; ?>" />
    </div>
      </div>
    </div>

    
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label for="imagem">Imagem</label>
        <input class="form-control-file" name="imagem" type="file" id="imagem" value="<?php echo $produto['imagem']; ?>" />
    </div>
      </div>
    </div>  

   <div class="row">
    <div class="col-md-6">
        <div >
        <button class="btn btn-primary btn-block float-right" type="submit">Salvar</button>
    </div>
    </div>
</div>


<?php   
}
?>
</form>
<br>
<br>
<?php	
}else{
?>

<form name="produto" method="post" action="controller/productController.php"  enctype="multipart/form-data">
	
<br>   
<div class="row">

    <div class="col-md-6">
         <h3 class="text-center">Cadastro de Produto</h3>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" name="nome" type="text" id="nome" />
        </div>

        </div>
    </div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input class="form-control" name="descricao" type="text" id="descricao" />
        </div>

    </div>
</div>
    
 <div class="row">
     <div class="col-md-6">
        <div class="form-group">
        <label for="preco">Preço</label>
        <input class="form-control" name="preco" type="number" min="0" step="any" id="preco" />
    </div>

     </div>

 </div>
    
 <div class="row">
     <div class="col-md-6">
        <div class="form-group">
        <label for="imagem">Imagem</label>
        <input class="form-control-file" name="imagem" type="file" id="imagem" />
    </div>
     </div>

 </div>

<div class="row">
    <div class="col-md-6">
        <div >
        <button class="btn btn-primary float-right" type="submit">Cadastrar</button>
    </div>
    </div>
</div>

</form>
<br>
<br>
<?php   
}
?>
</div>

<div class="container">
<?php 
include 'lista_produto.php';
?>
</div>

</body>
</html>
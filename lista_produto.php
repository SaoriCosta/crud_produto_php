<?php 
include 'header.php';
include_once 'controller/productController.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
<br>

<table class="table table-hover table-striped" id="produto">
	<thead>
		<tr>
			<th>Imagem</th>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Preço</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
	
		<?php
		
		$productController = new ProductController(new Product());
		$result = $productController->listProduct();

		while($produto = mysqli_fetch_array($result)) {  
			echo '<tr>';
			echo '<td> <img class="" src="Imagens/'.$produto['imagem'].'"  width="200" height="100" /> </td>'; 
			echo '<td>'.$produto['nome'].'</td>';           
		    echo '<td>'.$produto['descricao'].'</td>';
		    echo '<td>'.$produto['preco'].'</td>';
		?>
			<td><a class="btn btn-primary" href="index.php?id_produto_up=<?php echo $produto['id_produto'];?>">Editar</a></td>
			<td><a class="btn btn-danger" href="controller/productController.php?id_produto_del=<?php echo $produto['id_produto'];?>">Deletar</a></td>

		</tr>

	<?php
		}
	?>
	</tbody>

</table>



</body>
</html>
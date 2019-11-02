<?php include "database/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
</head>
<body>

<?php

if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_FILES['imagem'])){

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$imagem = $_FILES['imagem'];


$error = array();

if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
	   $error[1] = "Não é uma imagem.";
 	} 

if (count($error) == 0) {

	$nome_imagem = $imagem["name"];
	$caminho_imagem = "Imagens/" . $nome_imagem;
	
	if(move_uploaded_file($imagem["tmp_name"], $caminho_imagem)){
		echo "Tudo certo ao fazer o upload";
	}else{
		echo 'Ocorreu um erro ao fazer o upload';
	}

	$query = "INSERT INTO produto(nome, descricao, preco, imagem) VALUES('$nome', '$descricao', '$preco', '$nome_imagem')";
	$sql = mysqli_query(Database::getConnection(), $query) or die(Database::getConnection()->error);
	header("location: index.php");

}


}else{

$msg = "Campos vazios, preencha!";
header("location: index.php?msg=$msg");

}
?>


</body>
</html>



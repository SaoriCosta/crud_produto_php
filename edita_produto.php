<?php

include_once "database/db.php";

if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['preco']) && isset($_FILES['imagem'])){

$id_produto = $_POST['id_produto'];
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

	move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

	$query = "UPDATE produto SET nome = '$nome', descricao = '$descricao', preco = '$preco', imagem = '$nome_imagem' WHERE id_produto = $id_produto";
	$sql = mysqli_query(Database::getConnection(), $query) or die(Database::getConnection()->error);
	header("location: index.php");

 }else{
 	$query = "UPDATE produto SET nome = '$nome', descricao = '$descricao', preco = '$preco' WHERE id_produto = $id_produto";
	$sql = mysqli_query(Database::getConnection(), $query) or die(Database::getConnection()->error);
	header("location: index.php");
 }
}else{

$msg = "Campos vazios, preencha!";
header("location: index.php?msg=$msg");

}

?>
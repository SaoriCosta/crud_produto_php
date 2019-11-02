<?php 

include_once "database/db.php";


$id_produto = $_GET['id_produto'];


$query = "DELETE FROM produto WHERE id_produto = $id_produto";

$sql = mysqli_query(Database::getConnection(), $query) or die("Erro na conexão: ".Database::getConnection()->error);

header("location: index.php");

?>
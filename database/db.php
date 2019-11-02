<?php 


class Database {

    static $connection;

    static function getConnection(){

        return Database::$connection;

    }

    static function createConnection($host, $user, $pass, $dbName){
       
        try{

            Database::$connection = mysqli_connect($host, $user,$pass, $dbName) or die(mysqli_error);

        }catch(Exception $e){
            echo "erro de conexao banco" . $e;
        }
        

    }

}

if(Database::getConnection() == null){

    Database::createConnection("localhost","root", "", "cadastro" );

}




?>
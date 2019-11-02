<?php

require_once("abstractController.php");

class UserController extends AbstractController{

    function insert(){
        echo "user";
    }

}

$userController = new UserController();
$userController->insert();
$userController->delete();
$userController->update();
$userController->search();

?>


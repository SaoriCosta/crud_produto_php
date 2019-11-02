<?php

class Product {

    private $name;
    private $image;
    private $description;
    private $price;
    private $id;
   
    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
    }

    function getImage(){
        return $this->image;
    }

    function setImage($image){
        $this->image = $image;
    }

    function getDescription(){
        return $this->description;
    }

    function setDescription($description){
        $this->description = $description;
    }

    function getPrice(){
        return $this->price;
    }

    function setPrice($price){
        $this->price = $price;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

}

?>
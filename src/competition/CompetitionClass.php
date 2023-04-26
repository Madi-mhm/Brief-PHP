<?php 

class Competition {
    private $id; 
    private $name; 
    private $format;
    private $description;
    private $city;
    private $cashprize;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this -> id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this -> name = $name;
    }
    public function getFormat(){
        return $this->format;
    }
    public function setFormat($format){
        $this -> format = $format;
    }
    public function getCity(){
        return $this->city;
    }
    public function setCity($city){
        $this -> city = $city;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this -> description = $description;
    }
    public function getCashPrize(){
        return $this->cashprize;
    }
    public function setCashPrize($cashprize){
        $this -> cashprize = $cashprize;
    }
}

?>
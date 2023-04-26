<?php 
class Sponsor {
    private $id; 
    private $brand; 

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this -> id = $id;
    }
    public function getBrand(){
        return $this->brand;
    }
    public function setBrand($brand){
        $this -> brand = $brand;
    }
};

?>
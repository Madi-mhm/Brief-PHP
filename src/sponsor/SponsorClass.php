<?php 
class Sponsor {
    private $id; 
    private $brand; 
    private $team_name;
    private $team_id;


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
    public function getTeam_name(){
        return $this->team_name;
    }
    public function setTeam_name($team_name){
        $this -> team_name = $team_name;
    }
    public function getTeam_id(){
        return $this->team_id;
    }
    public function setTeam_id($team_id){
        $this -> team_id = $team_id;
    }
};

?>
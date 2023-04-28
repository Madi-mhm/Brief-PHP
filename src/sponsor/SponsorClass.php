<?php 
class Sponsor {
    private $id; 
    private $name; 
    private $team_name;
    private $team_id;


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
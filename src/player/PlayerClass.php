<?php 

class Player {
    private $id; 
    private $first_name; 
    private $second_name;
    private $city;
    private $team_id;
    private $game_id;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this -> id = $id;
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function setFirstName($first_name){
        $this -> first_name = $first_name;
    }
    public function getSecondName(){
        return $this->second_name;
    }
    public function setSecondName($second_name){
        $this -> second_name = $second_name;
    }
    public function getCity(){
        return $this->city;
    }
    public function setCity($city){
        $this -> city = $city;
    }
    public function getTeamId(){
        return $this->team_id;
    }
    public function setTeamId($team_id){
        $this -> team_id = $team_id;
    }
    public function getGameId(){
        return $this->game_id;
    }
    public function setGameId($game_id){
        $this -> game_id = $game_id;
    }
}

?>
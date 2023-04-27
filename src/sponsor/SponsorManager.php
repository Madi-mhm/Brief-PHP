<?php 

require_once ("./SponsorClass.php");
require_once ("../DBManager.php");
require ('../team/TeamClass.php');


class SponsorManager extends DBManager {

public function getAllSponsor() {

    $sponsorData = [];

    $res = $this->getConnexion()->query('SELECT sponsor.*, team.name AS team_name FROM sponsor 
                                        LEFT JOIN team ON sponsor.team_id = team.id');

    foreach ($res as $key) {
        $newSponsor = new Sponsor;
        $newSponsor->setBrand($key['brand']);
        $newSponsor->setId($key['id']);
        $newSponsor->setTeam_id($key['team_id']);
        $newSponsor->setTeam_name($key['team_name']);

        $sponsorData[] = $newSponsor;
    }
 return $sponsorData;
}

public function create($sponsor){
    $request = 'INSERT INTO sponsor (brand, team_id) VALUE (?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query -> execute([
        $sponsor->getBrand(),
        $sponsor->getTeam_id()
    ]);

    // Rafraichie la page
    header('Refresh:');
    
}

// teat´m manager
public function getAllTeams() {
    $res = $this->getConnexion()->query('SELECT * FROM team');   
 
    $teams = [];
 
    foreach ($res as $row) {
      $team = new Team();
      $team->setId($row['id']);
      $team->setName($row['name']);
      $team->setDescription($row['description']);
 
      $teams[] = $team;
    }
    return $teams;
 }


 public function findById($sponsorId) {
    $request = 'SELECT * FROM sponsor WHERE id = :id';
    $query = $this->getConnexion()->prepare($request);
    $query->execute([':id' => $sponsorId]);
    $row = $query->fetch();
  
    if ($row) {
        $sponsor = new Sponsor();
        $sponsor->setId($row['id']);
        $sponsor->setBrand($row['brand']);
        $sponsor->setTeam_id($row['team_id']);
        return $sponsor;
    }
  
    return null;
  }


 public function delete($sponsorId) {
    if ($sponsorId) {
        $sponsorToDelete = $this->findById($sponsorId);

        if ($sponsorToDelete) {
            $request = 'DELETE FROM sponsor WHERE id = ' . $sponsorId;
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: admin_sponsor.php');
            exit();
        }
    }
}

}



?>

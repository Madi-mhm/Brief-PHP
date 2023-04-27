<?php 

require ("./SponsorClass.php");
require ("../DBManager.php");

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
}

?>

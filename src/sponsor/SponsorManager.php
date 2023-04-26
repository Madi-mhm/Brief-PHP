<?php 

require ("./SponsorClass.php");
require ("../DBManager.php");

class SponsorManager extends DBManager {

public function getAllSponsor() {

    $sponsorData = [];

    $res = $this->getConnexion()->query('SELECT * FROM sponsor');

    foreach ($res as $key) {
        $newSponsor = new Sponsor;
        $newSponsor->setBrand($key['brand']);

        $sponsorData[] = $newSponsor;
    }
 return $sponsorData;
}

public function create($sponsor){
    $request = 'INSERT INTO sponsor (id, brand) VALUE (?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query = execute([
        $sponsor->getId, $sponsor->getBrand
    ]);

    // Rafraichie la page
    header('Refresh:');
}
}

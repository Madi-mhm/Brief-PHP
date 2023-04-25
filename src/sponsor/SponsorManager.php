<?php 

require ("./SponsorClass.php");
require ("../DBManager.php");

class SponsorManager extends DBManager {

public function getAll() {

    $sponsorData = [];

    $res = $this->getConnexion()->query('SELECT * FROM sponsor');

    foreach ($res as $key) {
        $newSponsor = new Sponsor;
        $newSponsor->setBrand($key['brand']);

        $sponsorData[] = $newSponsor;
    }
 return $sponsorData;
}
}

?>
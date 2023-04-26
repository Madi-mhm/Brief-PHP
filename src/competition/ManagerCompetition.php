<?php 

require('../DBManager.php');
require('./CompetitionClass.php');

class ManagerCompetition extends DBManager {

    public function getAllCompetitions() {
        $res = $this->getConnexion()->query('SELECT * from competition');

        $competitions = [];

        foreach($res as $competition) {
          $newCompetition = new Competition();
           $newCompetition->setId($competition['id']);
          $newCompetition->setName($competition['name']);
          $newCompetition->setDescription($competition['description']);
          $newCompetition->setCity($competition['city']);
          $newCompetition->setFormat($competition['format']);
          $newCompetition->setCashPrize($competition['cash_prize']);

          $competitions[] = $newCompetition;
        }
        return $competitions;
    }
    public function create($competition) {
    $request = 'INSERT INTO competition (name, description, city, format, cash_prize) VALUE (?, ?, ?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query->execute([
        $competition->getName(), $competition->getDescription(), $competition->getCity(), $competition->getFormat(), $competition->getCashPrize()
    ]);

    // Rafraichie la page
    header('Refresh:0');
  }
}

?>
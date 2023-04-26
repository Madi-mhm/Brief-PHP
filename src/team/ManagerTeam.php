<?php 

require ('../DBManager.php');

require ('./TeamClass.php');



class ManagerTeam extends DBManager {

  public function getAllTeams() {
    $res = $this->getConnexion()->query('SELECT * FROM team');   
 
    $teams = [];
 
    foreach ($res as $row) {
      $team = new Team();
      $team->setName($row['name']);
      $team->setDescription($row['description']);
 
      $teams[] = $team;
    }
    return $teams;
 }
public function create($team) {
    // Je prépare ma requête
    $request = 'INSERT INTO team (name, description) VALUE (?, ?)';
    $query = $this->getConnexion()->prepare($request);

    // Je définir les valeurs de ma requete (remplate les ???)
    $query->execute([
        $team->getName(), $team->getDescription()
    ]);

    // Rafraichie la page
    header('Refresh:0');
  }
}

?>
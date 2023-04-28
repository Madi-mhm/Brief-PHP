<?php 

require_once ('../DBManager.php');

require ('./TeamClass.php');

class ManagerTeam extends DBManager {

  public function getAllTeams() {
    $res = $this->getConnexion()->query('SELECT * FROM team Order by team.id ASC');   
 
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

 public function findById($teamId) {
  $request = 'SELECT * FROM team WHERE id = :id';
  $query = $this->getConnexion()->prepare($request);
  $query->execute([':id' => $teamId]);
  $row = $query->fetch();

  if ($row) {
      $team = new Team();
      $team->setId($row['id']);
      $team->setName($row['name']);
      $team->setDescription($row['description']);
      return $team;
  }

  return null;
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

  public function delete($teamId) {
    if ($teamId) {
        $teamToDelete = $this->findById($teamId);

        if ($teamToDelete) {
            $request = 'DELETE FROM team WHERE id = ' . $teamId;
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: admin_team.php');
            exit();
        }
    }
}
}

?>
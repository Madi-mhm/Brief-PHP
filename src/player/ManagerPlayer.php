<?php 

require_once ('../DBManager.php');

require_once('../team/TeamClass.php');

require_once('../game/GameClass.php');

require('./PlayerClass.php');

class ManagerPlayer extends DBManager {

    public function getAllPlayers() {
        $res = $this->getConnexion()->query('SELECT * from player Order by player.id ASC');

        $players = [];

        foreach($res as $row) {
          $newPlayer = new Player();
          $newPlayer->setId($row['id']);
          $newPlayer->setFirstName($row['first_name']);
          $newPlayer->setSecondName($row['second_name']);
          $newPlayer->setCity($row['city']);
          $newPlayer->setTeamId($row['team_id']);
          $newPlayer->setGameId($row['game_id']);

          $players[] = $newPlayer;
        }
        return $players;
    }

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

    public function getAllGames() {
        $res = $this->getConnexion()->query('SELECT * from game');

        $games = [];

        foreach($res as $game) {
          $newGame = new Game();
          $newGame->setName($game['name']);
          $newGame->setFormat($game['format']);
          $newGame->setStation($game['station']);
          $newGame->setId($game['id']);

          $games[] = $newGame;
        }
        return $games;
    }

    public function create($player) {
    $request = 'INSERT INTO player (first_name, second_name, city, team_id, game_id) VALUE (?, ?, ?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query->execute([
        $player->getFirstName(), $player->getSecondName(), $player->getCity(), $player->getTeamId(), $player->getGameId()
    ]);

    // Rafraichie la page
    header('Refresh:0');
  }

   public function findById($playerId) {
  $request = 'SELECT * FROM player WHERE id = :id';
  $query = $this->getConnexion()->prepare($request);
  $query->execute([':id' => $playerId]);
  $row = $query->fetch();

  if ($row) {
      $newPlayer = new Player();
      $newPlayer->setId($row['id']);
      $newPlayer->setFirstName($row['first_name']);
      $newPlayer->setSecondName($row['second_name']);
      $newPlayer->setCity($row['city']);
      $newPlayer->setTeamId($row['team_id']);
      $newPlayer->setGameId($row['game_id']);
      return $newPlayer;
  }

  return null;
}

  public function delete($playerId) {
     $playerToDelete = $this->findById($playerId);
     if($playerToDelete) {
       $request = 'DELETE from player WHERE id = ' . $playerId;
       $query = $this->getConnexion()->prepare($request);
       $query->execute();

       header('Location:admin_player.php');
       exit();
     }
  }
 
}

?>
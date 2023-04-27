<?php 

require_once ('../DBManager.php');

require_once('../team/TeamClass.php');

require_once('../game/GameClass.php');

require('./PlayerClass.php');

class ManagerPlayer extends DBManager {

    public function getAllPlayers() {
        $res = $this->getConnexion()->query('SELECT * from player');

        $players = [];

        foreach($res as $player) {
          $newPlayer = new Player();
          $newPlayer->setId($player['id']);
          $newPlayer->setFirstName($player['first_name']);
          $newPlayer->setSecondName($player['second_name']);
          $newPlayer->setCity($player['city']);
          $newPlayer->setTeamId($player['team_id']);
          $newPlayer->setGameId($player['game_id']);

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

   public function delete($playerId) {
    if ($playerId) {
        $playerToDelete = $this->findById($playerId);

        if ($playerToDelete) {
            $request = 'DELETE FROM player WHERE id = ' . $playerId;
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: admin_player.php');
            exit();
        }
    }
}
  
}

?>
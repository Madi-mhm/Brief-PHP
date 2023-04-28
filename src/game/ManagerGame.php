<?php 

require_once ('../DBManager.php');
require('./GameClass.php');

class ManagerGame extends DBManager {

    public function getAllGames() {
        $res = $this->getConnexion()->query('SELECT * from game Order by game.id ASC');

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
    public function create($game) {
    $request = 'INSERT INTO game (name, format, station) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query->execute([
        $game->getName(), $game->getFormat(), $game->getStation()
    ]);

    // Rafraichie la page
    header('Refresh:0');
  }
  
 public function findById($gameId) {
  $request = 'SELECT * FROM game WHERE id = :id';
  $query = $this->getConnexion()->prepare($request);
  $query->execute([':id' => $gameId]);
  $row = $query->fetch();

  if ($row) {
      $game = new Game();
      $game->setId($row['id']);
      $game->setName($row['name']);
      $game->setFormat($row['format']);
      $game->setStation($row['station']);
      return $game;
  }

  return null;
}


public function delete($gameId) {
  if ($gameId) {
      $gameToDelete = $this->findById($gameId);

      if ($gameToDelete) {
          $request = 'DELETE FROM game WHERE id = ' . $gameId;
          $query = $this->getConnexion()->prepare($request);
          $query->execute();

          header('Location: admin_game.php');
          exit();
      }
  }
}
}
   
?>
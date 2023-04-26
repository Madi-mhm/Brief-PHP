<?php 

require('../DBManager.php');

class ManagerGame extends DBManager {

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
    public function create($game) {
    $request = 'INSERT INTO game (name, format, station) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query->execute([
        $game->getName(), $game->getFormat(), $game->getStation()
    ]);

    // Rafraichie la page
    header('Refresh:0');
  }
}
   
?>
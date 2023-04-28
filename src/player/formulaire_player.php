<?php 

require './ManagerPlayer.php';

$managerPlayer = new ManagerPlayer();

$allPlayers = $managerPlayer->getAllPlayers();
$allTeams = $managerPlayer->getAllTeams(); 
$allGames = $managerPlayer->getAllGames(); 

if (isset($_POST['first_name']) && isset($_POST['second_name']) && isset($_POST['city']) && isset($_POST['team_id']) && isset($_POST['game_id'])) {
    $newPlayer = new Player();

    $newPlayer->setFirstName($_POST['first_name']);
    $newPlayer->setSecondName($_POST['second_name']);
    $newPlayer->setCity($_POST['city']);
    $newPlayer->setTeamId(intval($_POST['team_id']));
    $newPlayer->setGameId(intval($_POST['game_id']));

    $managerPlayer->create($newPlayer);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaire_player.css">
    <title>Brief php</title>
</head>
<body>
<section class="topButton">
    <a class="homeBtn" href="../../index.php"></a>
    <a class="adminBtn" href="./admin_player.php"></a>
</section>
    <section class="page">
        <form method="POST" action="">
           <h1>Player</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="first_name">Prénom</label>
                        <input type="text" name="first_name">
                    </div>
                    <div class="boite">
                        <label for="second_name">Nom</label>
                        <input type="text" name="second_name">
                    </div>
                    <div class="boite">
                        <label for="city">Ville</label>
                        <input type="text" name="city">
                    </div>
                   <div class="boite dropDown">
                        <label for="team_id">Equipe</label>
                        <select type="select" name="team_id">
                           <?php foreach($allTeams as $team) { ?>
                                  <option value="<?= $team->getId() ?>"><?= $team->getName() ?></option>
                           <?php } ?>
                        </select>
                    </div>
                    <div class="boite dropDown">
                        <label for="game_id">Jeu</label>
                        <select type="select" name="game_id">
                            <?php foreach($allGames as $game) { ?>
                                   <option value="<?= $game->getId() ?>"><?= $game->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="pied-formulaire">
                <button name="submit"><strong>submit</strong></button>
            </div>
           </div>
        </form>
    </section>

</body>
</html>
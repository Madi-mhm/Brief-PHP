<?php 

 require('./ManagerPlayer.php');
 $managerPlayer = new ManagerPlayer();
 $allPlayers = $managerPlayer->getAllPlayers();

 // Gère la suppression
 if(isset($_GET['delete'])) {
    $managerPlayer->delete($_GET['delete']);
 }

$allPlayers = $managerPlayer->getAllPlayers();
$playerToEdit = null;
if (isset($_GET['edit'])) {
    $playerId = $_GET['edit'];
    $playerToEdit = $managerPlayer->findById($playerId);
}

$allTeams = $managerPlayer->getAllTeams();
$teamToEdit = null;
if (isset($_GET['edit'])) {
    $teamId = $_GET['edit'];
    $teamToEdit = $managerPlayer->findById($teamId);
}

$allGames = $managerPlayer->getAllGames();
$gameToEdit = null;
if (isset($_GET['edit'])) {
    $gameId = $_GET['edit'];
    $gameToEdit = $managerPlayer->findById($gameId);
}

if (isset($_POST['update'])) {
    $playerId = $_POST['id'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $city = $_POST['city'];
    $team_id = $_POST['team_id'];
    $game_id = $_POST['game_id'];
    $managerPlayer->edit($playerId, $first_name, $second_name, $city, $team_id, $game_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_player.css">
    <title>Brief php</title>
</head>
<body>
  <a class="homeBtn" href="../../index.php"></a>

    <section class="page_admin">
        <h1>Administration player page</h1>
        <div class="tab">
          <table> 
            <thead>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>City</th>
                <th>Team</th>
                <th>Game</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
             <?php foreach ($allPlayers as $player) { ?>

            <tr>
            <td><?php echo $player->getFirstName(); ?></td>
            <td><?php echo $player->getSecondName(); ?></td>
            <td><?php echo $player->getCity(); ?></td>
            <td>
                <?php
                $team = $managerPlayer->getTeamById($player->getTeamId());
                echo $team ? $team->getName() : '-';
                ?>
            </td>
            <td>
                <?php
                $game = $managerPlayer->getGameById($player->getGameId());
                echo $game ? $game->getName() : '-';
                ?>
            </td>
          
                 
            <td><a href="admin_player.php?delete=<?php echo $player->getId(); ?>" class="trash"></a></td>
            <td><a href="admin_player.php?edit=<?php echo $player->getId(); ?>" class="edit"></a></td>
                
            
            </tr>
                 <?php } ?>

            </tbody>
          </table>
          <a href="./formulaire_player.php"><button class="btn">RETURN</button></a>
        </div>
    </section>

    <!-- POPPUP -->
    <section class="playerPopup">
        <div class="popupContainer">
        <form method="POST" action="admin_player.php">
           <h1>Players</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="<?php echo $playerToEdit ? $playerToEdit->getFirstName() : ''; ?>">
                    </div>
                    <div class="boite">
                        <label for="second_name">Second Name</label>
                        <input type="text" name="second_name" value="<?php echo $playerToEdit ? $playerToEdit->getSecondName() : ''; ?>">
                    </div>
                    <div class="boite">
                        <label for="city">City</label>
                        <input type="text" name="city" value="<?php echo $playerToEdit ? $playerToEdit->getCity() : ''; ?>">
                    </div>
                    <div class="boite dropDown">
                        <label for="team_id">Team</label>
                        <select type="select" name="team_id">
                          <?php foreach($allTeams as $team) { ?>
                          <option value="<?php echo $team->getId(); ?>" <?php if ($playerToEdit && $playerToEdit->getTeamId() == $team->getId()) echo 'selected'; ?>><?= $team->getName() ?></option>
                          <?php } ?>
                        </select>
                    </div>

                    <div class="boite">
                        <label for="game_id">Game</label>
                        <select type="select" name="game_id">
                          <?php foreach($allGames as $game) { ?>
                        <option value="<?php echo $game->getId(); ?>" <?php if ($playerToEdit && $playerToEdit->getGameId() == $game->getId()) echo 'selected'; ?>><?= $game->getName() ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $playerToEdit ? $playerToEdit->getId() : ''; ?>">

                </div>
            </div>
            <div class="pied-formulaire">
            <a href="admin_player.php"><button class="cancelButton" type="button"><strong>Cancel</strong></button></a>
                <button class="updateButton" name="update"><strong>Update</strong></button>
            </div>
           </div>
        </form>
            <div>
        </section>
</body>
</html>
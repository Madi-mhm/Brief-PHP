<?php 

 require('./ManagerPlayer.php');
 $managerPlayer = new ManagerPlayer();
 $allPlayers = $managerPlayer->getAllPlayers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_player.css">
    <script type="module" src="player.js"></script> 
    <title>Brief php</title>
</head>
<body>
    <section class="page_admin">
        <h1>Administration player page</h1>
        <div class="tab">
          <table> 
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Equipe</th>
                <th>Jeu</th>
            </tr>
            </thead>
            <tbody>
             <?php foreach ($allPlayers as $player) { ?>
                <tr>
                  <td><?php echo $player->getFirstName(); ?></td>
                  <td><?php echo $player->getSecondName(); ?></td>
                  <td><?php echo $player->getCity(); ?></td>
                  <td><?php echo $player->getTeamId(); ?></td>
                  <td><?php echo $player->getGameId(); ?></td>
                </tr>
              <?php } ?>
              <?php if (isset($_POST['first_name'])) { ?>
                <tr>
                  <td><?php echo $_POST['first_name']; ?></td>
                  <td><?php echo $_POST['second_name']; ?></td>
                  <td><?php echo $_POST['city']; ?></td>
                  <td><?php echo $_POST['team_id']; ?></td>
                  <td><?php echo $_POST['game_id']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <a href="../../index.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
</body>
</html>
<?php 

require('./ManagerGame.php');
$managerGame = new ManagerGame();
$allGames = $managerGame->getAllGames();


// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $managerGame->delete($_GET['delete']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_game.css">
    <script type="module" src="game.js"></script> 
    <title>Brief php</title>
</head>
<body>
    <section class="page_admin">
        <h1>Administration game page</h1>
        <div class="tab">
          <table> 
            <thead>
            <tr>
                <th>Nom</th>
                <th>Station</th>
                <th>Format</th>
                <th>Suprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allGames as $game) { ?>
                <tr>
                  <td><?php echo $game->getName(); ?></td>
                  <td><?php echo $game->getStation(); ?></td>
                  <td><?php echo $game->getFormat(); ?></td>
                  <td><a href="admin_game.php?delete=<?php echo $game->getId(); ?>" class="trash"></a></td>
                </tr>
              <?php } ?>
              <?php if (isset($_POST['name'])) { ?>
                <tr>
                  <td><?php echo $_POST['name']; ?></td>
                  <td><?php echo $_POST['station']; ?></td>
                  <td><?php echo ($_POST['format']); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <a href="../../index.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
</body>
</html>

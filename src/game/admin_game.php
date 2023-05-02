<?php 

require('./ManagerGame.php');
$managerGame = new ManagerGame();
$allGames = $managerGame->getAllGames();


// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $managerGame->delete($_GET['delete']);
}

$allGames = $managerGame->getAllGames();
$gameToEdit = null;
if (isset($_GET['edit'])) {
    $gameId = $_GET['edit'];
    $gameToEdit = $managerGame->findById($gameId);
}

if (isset($_POST['update'])) {
    $gameId = $_POST['id'];
    $name = $_POST['name'];
    $station = $_POST['station'];
    $format = $_POST['format'];
    $managerGame->edit($gameId, $name, $station, $format);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_game.css">
    <title>Brief php</title>
    <!-- <script src="game.js"></script> -->

</head>
<body>
<a class="homeBtn" href="../../index.php"></a>

    <section id="page_admin" class="page_admin">
        <h1>Administration game page</h1>
        <div class="tab">
          <table> 
            <thead>
            <tr>
                <th>Name</th>
                <th>Station</th>
                <th>Format</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allGames as $game) { ?>
    <tr>
        <td><?php echo $game->getName(); ?></td>
        <td><?php echo $game->getStation(); ?></td>
        <td><?php echo $game->getFormat(); ?></td> 
        <td><a href="admin_game.php?delete=<?php echo $game->getId(); ?>" class="trash"></a></td>
        <td><a href="admin_game.php?edit=<?php echo $game->getId(); ?>" class="edit"></a> </td>
       
    </tr>
<?php } ?>
            </tbody>
          </table>
          <a href="./formulaire_game.php"><button class="btn">RETURN</button></a>
        </div>
    </section>

    <!-- POPPUP -->
    <section id="editPoppup" class="editPoppup">
        <div class="poppupContainer">
        <form method="POST" action="admin_game.php">
           <h1>Game</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $gameToEdit ? $gameToEdit->getName() : ''; ?>">
                    </div>
                    <div class="boite">
                        <label for="station">Station</label>
                        <input type="text" name="station" value="<?php echo $gameToEdit ? $gameToEdit->getStation() : ''; ?>">
                    </div>
                    <div class="boite">
                        <label for="format">Format</label>
                        <input type="text" name="format" value="<?php echo $gameToEdit ? $gameToEdit->getFormat() : ''; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $gameToEdit ? $gameToEdit->getId() : ''; ?>">

                </div>
            </div>
            <div class="pied-formulaire">
            <a href="admin_game.php"><button class="cancelButton" type="button"><strong>Cancel</strong></button></a>
                <button class="updateButton" name="update"><strong>Update</strong></button>
            </div>
           </div>
        </form>
            <div>
        </section>
</body>
</html>

<?php 
require './ManagerGame.php';

$managerGame = new ManagerGame();
$allGames = $managerGame->getALlGames();

if (!empty($_POST['name']) && isset($_POST['station']) && isset($_POST['format'])) {
    $newGame = new Game();

    $newGame->setName($_POST['name']);
    $newGame->setStation($_POST['station']);
    $newGame->setFormat($_POST['format']);

    $managerGame->create($newGame);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaire_game.css">
    <title>Brief php</title>
</head>
<body>
    <section class="page">
        <form method="POST" action="">
           <h1>Game</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="name">Name</label>
                        <input type="text" name="name" axlength="50">
                    </div>
                    <div class="boite">
                        <label for="station">Station</label>
                        <input type="text" name="station" maxlength="1000">
                    </div>
                    <div class="boite">
                        <label for="format">Format</label>
                        <input type="text" name="format" maxlength="50">
                    </div>
                </div>
            </div>
            <div class="pied-formulaire">
                <button name="submit"><strong>submit</strong></button>
            </div>
           </div>
        </form>
    </section>
    <script type="module" src="game.js"></script> 

</body>


</html>
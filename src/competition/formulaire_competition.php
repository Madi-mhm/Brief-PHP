<?php 

require './ManagerCompetition.php';

$managerCompetition = new ManagerCompetition();
$allCompetitions = $managerCompetition->getAllCompetitions();

if (!empty($_POST['name']) && isset($_POST['description']) && isset($_POST['format']) && isset($_POST['city']) && isset($_POST['cash_prize'])) {
    $newCompetition = new Competition();

    $newCompetition->setName($_POST['name']);
    $newCompetition->setDescription($_POST['description']);
    $newCompetition->setCity($_POST['city']);
    $newCompetition->setFormat($_POST['format']);
    $newCompetition->setCashPrize($_POST['cash_prize']);

    $managerCompetition->create($newCompetition);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire_competition.css">
    <script type="module" src="competition.js"></script> 
    <title>Brief php</title>
</head>
<body>
    <a href="../../index.php"><button class="homeBtn">Home</button></a>
    <section class="page">
        <form method="POST" action="">
           <h1>Competition</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="name">Nom de la compétition</label>
                        <input type="text" name="name">
                    </div>
                    <div class="boite">
                        <label for="description">Description</label>
                        <input type="text" name="description">
                    </div>
                    <div class="boite">
                        <label for="city">Ville</label>
                        <input type="text" name="city">
                    </div>
                    <div class="boite">
                        <label for="format">Format</label>
                        <select type="select" name="format">
                            <option value="mmo">MMO</option>
                            <option value="mmorpg">MMORPG</option>
                            <option value="moba">MOBA</option>
                            <option value="fps">FPS</option>
                            <option value="battle_royale">BATTLE ROYALE</option>
                            <option value="jeu_de_carte_à_sélectionner">JEU DE CARTES A SELECTIONNER</option>
                            <option value="sport">SPORT</option>
                            <option value="fps_tactique">FPS TACTIQUE</option>
                            <option value="combat">COMBAT</option>
                        </select>
                    </div>
                    <div class="boite">
                        <label for="cash_prize">Récompense</label>
                        <input type="number" name="cash_prize">
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
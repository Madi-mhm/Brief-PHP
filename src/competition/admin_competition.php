<?php
require('./ManagerCompetition.php');
$managerCompetition = new ManagerCompetition();

// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $managerCompetition->delete($_GET['delete']);
}

$getAllCompetitions = $managerCompetition->getAllCompetitions();

// Update data
if (isset($_POST['update'])) {
    $competitionId = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $format = $_POST['format'];
    $reward = $_POST['reward'];

    $managerCompetition->edit($competitionId, $name, $description, $city, $format, $reward);
}

$competitionToEdit = null;
if (isset($_GET['edit'])) {
    $competitionId = $_GET['edit'];
    $competitionToEdit = $managerCompetition->findById($competitionId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_competition.css">
    <title>Admin Competition</title>
</head>
<body>
<a class="homeBtn" href="../../index.php"></a>

    <section class="page_admin">
        <h1>Administration competition page</h1>
        <div class="tab">
          <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Ville</th>
                <th>Format</th>
                <th>Récompense</th>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
             <?php foreach ($getAllCompetitions as $competition) { ?>
                <tr>
                  <td><?php echo $competition->getName(); ?></td>
                  <td><?php echo $competition->getDescription(); ?></td>
                  <td><?php echo $competition->getCity(); ?></td>
                  <td><?php echo $competition->getFormat(); ?></td>
                  <td><?php echo $competition->getCashPrize(); ?></td>
                  <td><a href="admin_competition.php?delete=<?php echo $competition->getId(); ?>" class="trash"></a></td>
                  <td> <a id="editButton" href="admin_competition.php?edit=<?php echo $competition->getId(); ?>" class="edit"></a></td>
                </tr>
              <?php } ?>
              <?php if (isset($_POST['name'])) { ?>
                <tr>
                  <td><?php echo $_POST['name']; ?></td>
                  <td><?php echo $_POST['description']; ?></td>
                  <td><?php echo $_POST['city']; ?></td>
                  <td><?php echo $_POST['format']; ?></td>
                  <td><?php echo $_POST['reward']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <a href="./formulaire_competition.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
    <section class="competitionPopup">
    <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $competitionToEdit ? $competitionToEdit->getId() : ''; ?>">
       <h1>Competition</h1>
       <div class="séparation">
        <div class="corps-formulaire">
            <div class="contenu">
                <div class="boite">
                    <label for="name">Nom de la compétition</label>
                    <input type="text" name="name" value="<?php echo $competitionToEdit ? $competitionToEdit->getName() : ''; ?>">
                </div>
                <div class="boite">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="<?php echo $competitionToEdit ? $competitionToEdit->getDescription() : ''; ?>">
                </div>
                <div class="boite">
                    <label for="city">Ville</label>
                    <input type="text" name="city" value="<?php echo $competitionToEdit ? $competitionToEdit->getCity() : ''; ?>">
                </div>
                <div class="boite dropDown">
                    <label for="format">Format</label>
                    <select type="select" name="format">
                        <option value="MMO" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'MMO') echo 'selected'; ?>>MMO</option>
                        <option value="MMORPG" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'MMORPG') echo 'selected'; ?>>MMORPG</option>
                        <option value="Moba" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'Moba') echo 'selected'; ?>>MOBA</option>
                        <option value="FPS" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'FPS') echo 'selected'; ?>>FPS</option>
                        <option value="Battle royale" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'Battle royale') echo 'selected'; ?>>BATTLE ROYALE</option>
                        <option value="Jeu de cartes à colectionner" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'Jeu de cartes à collectionner') echo 'selected'; ?>>JEU DE CARTES A COLLECTIONNER</option>
                        <option value="Sport" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'Sport') echo 'selected'; ?>>SPORT</option>
                        <option value="FPS tactique" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'FPS tactique') echo 'selected'; ?>>FPS TACTIQUE</option>
                        <option value="Combat" <?php if($competitionToEdit && $competitionToEdit->getFormat() == 'Combat') echo 'selected'; ?>>COMBAT</option>
                    </select>
                </div>
                <div class="boite">
                    <label for="reward">Récompense</label>
                    <input type="number" name="reward" value="<?php echo $competitionToEdit ? $competitionToEdit->getCashPrize() : ''; ?>">
                </div>
            </div>
        </div>
        <div class="pied-formulaire">
            <button class="cancelButton" value="add competition"><strong>Cancel</strong></button>
            <button class="submitButton" name="update" value="add competition"><strong>Update</strong></button>
        </div>
       </div>
    </form>
</section>
</body>
</html>


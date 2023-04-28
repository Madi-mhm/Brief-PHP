<?php
require('./ManagerTeam.php');
$managerTeam = new ManagerTeam();

// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $managerTeam->delete($_GET['delete']);
}

// update data
if (isset($_POST['update'])) {
    $teamId = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $managerTeam->edit($teamId, $name, $description);
}

$allTeams = $managerTeam->getAllTeams();
$teamToEdit = null;
if (isset($_GET['edit'])) {
    $teamId = $_GET['edit'];
    $teamToEdit = $managerTeam->findById($teamId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin_team.css">
    <title>Brief php</title>
</head>
<body>
<section class="page_admin">
        <h1>Administration team page</h1>
        <div class="tab">
          <table> 
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allTeams as $team) { ?>
    <tr>
        <td><?php echo $team->getName(); ?></td>
        <td><?php echo $team->getDescription(); ?></td>
        <td>
        <section class="crudButton">    
        <a href="admin_team.php?delete=<?php echo $team->getId(); ?>" class="trash"></a>
        <a href="admin_team.php?edit=<?php echo $team->getId(); ?>" class="edit"></a>
            </section>
        </td>
    </tr>
<?php } ?>
            </tbody>
          </table>
          <a href="./formulaire_team.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>

    <!-- POPPUP -->
    <section class="editPoppup ">
        <div class="poppupContainer">
        <form method="POST" action="">
           <h1>Equipes</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="name">Nom de l'équipe</label>
                        <input type="text" name="name" value="<?php echo $teamToEdit ? $teamToEdit->getName() : ''; ?>">
                    </div>
                    <div class="boite">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="<?php echo $teamToEdit ? $teamToEdit->getDescription() : ''; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $teamToEdit ? $teamToEdit->getId() : ''; ?>">

                </div>
            </div>
            <div class="pied-formulaire">
            <a href="admin_team.php"><button class="cancelButton" type="button"><strong>Cancel</strong></button></a>
                <button class="updateButton" name="update"><strong>Update</strong></button>
            </div>
           </div>
        </form>
            <div>
        </section>
</body>
</html>
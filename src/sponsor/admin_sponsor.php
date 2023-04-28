<?php 

require('./SponsorManager.php');
$sponsorManager = new SponsorManager();


// Gère la suppression
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $sponsorManager->delete($_GET['delete']);
  }



$getAllSponsor = $sponsorManager->getAllSponsor();
  



require_once './SponsorManager.php';
$sponsorManager = new SponsorManager();
$allTeams = $sponsorManager->getAllTeams(); 

// Update data
if (isset($_POST['update'])) {
    $sponsorId = $_POST['id'];
    $name = $_POST['name'];
    $team_id = $_POST['team_id'];

    $sponsorManager->edit($sponsorId, $name, $team_id);
}

$sponsorToEdit = null;
if (isset($_GET['edit'])) {
    $sponsorId = $_GET['edit'];
    $sponsorToEdit = $sponsorManager->findById($sponsorId);

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_sponsor.css">
    <title>Admin Sponsor</title>
</head>
<body>
<a class="homeBtn" href="../../index.php"></a>

    <section class="page_admin">

        <h1>Administration sponsor page</h1>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                    <tr>
                        <td>ID</td>
                        <th>Name</th>
                        <th>Team</th>
                        <td></td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getAllSponsor as $sponsor) { ?>
                        <tr>
                            <td><?php echo $sponsor->getId(); ?></td>
                            <td><?php echo $sponsor->getName(); ?></td>
                            <td><?php echo $sponsor->getTeam_name(); ?></td>
                            <td><a href="admin_sponsor.php?delete=<?php echo $sponsor->getId(); ?>"  class="trash"></a></td>
                            <td> <a id="editButton" href="admin_sponsor.php?edit=<?php echo $sponsor->getId(); ?>" class="edit"></a></td>

                            

                        </tr>
                    <?php } ?>
                    

                    <?php if (isset($_POST['submit'])) { ?>
                        <tr>
                          <td><?php echo $_POST['id']; ?></td>
                          <td><?php echo $_POST['name']; ?></td>
                          <td><?php echo $_POST['team_name']; ?></td>
                        </tr>
                    <?php } ?>
                      

                    </tbody>
                <tbody>
            </table>
            <a href="./formulaire_sponsor.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
    <section class="sponsorPopup">
        <div class="popupContainer">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $sponsorToEdit ? $sponsorToEdit->getId() : ''; ?>">

           <h1>Sponsor</h1>
           <div class="séparation">
                <div class="corps-formulaire">
                    <div class="contenu">
                        <div class="boite">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $sponsorToEdit ? $sponsorToEdit->getName() : ''; ?>" >
                        </div>
                    </div>
                </div>
                <div class="dropDown">
                        <label for="format">Format</label>
                        <select type="select" name="team_id">
                            <?php foreach ($allTeams as $team) { ?>
                            <option value="<?= $team->getId(); ?>"  
                                <?php if($sponsorToEdit && $sponsorToEdit->getTeam_Id() == $team->getId()) echo 'selected'; ?>> <?= $team->getName(); ?> </option>
                            <?php } ?>

                        </select>
                </div>
                <div class="pied-formulaire">
                    <button class="cancelButton" value="add sponsor" ><strong>Cancel</strong></button>
                    <button class="submitButton" name="update" value="add sponsor" ><strong>Update</strong></button>
                </div>
           </div>
        </form>
        </div>
    </section>
    
</body>
</html>


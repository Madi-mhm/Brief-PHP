<?php 

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
    <title>PopUp</title>
    <link rel="stylesheet" href="./admin_sponsor.css">
</head>
<body>
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
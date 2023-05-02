<?php require './ManagerTeam.php';

$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAllTeams();

// gère la création
if (isset($_POST['name']) && isset($_POST['description'])) {
    $newTeam = new Team();

    $newTeam->setName($_POST['name']);
    $newTeam->setDescription($_POST['description']);

    $managerTeam->create($newTeam);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaire_team.css">
    <title>Brief php</title>
</head>
<body>
    <section class="topButton">
    <a class="homeBtn" href="../../index.php"></a>
    <a class="adminBtn" href="./admin_team.php"></a>
</section>
    
    <section class="page">
        <form method="POST" action="">
           <h1>Team</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label for="name">Team name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="boite">
                        <label for="description">Description</label>
                        <input type="text" name="description">
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
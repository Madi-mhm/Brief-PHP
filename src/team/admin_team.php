<?php 
require('./ManagerTeam.php');
$managerTeam = new ManagerTeam();
$allTeams = $managerTeam->getAllTeams();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin_team.css">
    <script type="module" src="team.js"></script> 
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
            </tr>
            </thead>
            <tbody>
            <?php foreach ($allTeams as $team) { ?>
                <tr>
                  <td><?php echo $team->getName(); ?></td>
                  <td><?php echo $team->getDescription(); ?></td>
                </tr>
              <?php } ?>
              
              <?php if (isset($_POST['name'])) { ?>
                <tr>
                  <td><?php echo $_POST['name']; ?></td>
                  <td><?php echo ($_POST['description']); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <a href="../../index.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
</body>
</html>

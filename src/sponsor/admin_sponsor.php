<?php 

require('./SponsorManager.php');
$sponsorManager = new SponsorManager();
$getAllSponsor = $sponsorManager->getAllSponsor();





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
    <section class="page_admin">
        <h1>Administration game page</h1>
        <div class="tab">
            <table>
                <thead>
                    <tr>
                    <tr>
                        <td>ID</td>
                        <th>Brand</th>
                        <th>Team</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getAllSponsor as $sponsor) { ?>
                        <tr>
                            <td><?php echo $sponsor->getId(); ?></td>
                            <td><?php echo $sponsor->getBrand(); ?></td>
                            <td><?php echo $sponsor->getTeam_name(); ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (isset($_POST['submit'])) { ?>
                        <tr>
                          <td><?php echo $_POST['id']; ?></td>
                          <td><?php echo $_POST['brand']; ?></td>
                          <td><?php echo $_POST['team_name']; ?></td>
                        </tr>
                    <?php } ?>
                      

                    </tbody>
                <tbody>
            </table>
            <a href="../../index.php"><button class="btn">RETOUR</button></a>
        </div>
    </section>
</body>
</html>

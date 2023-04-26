<?php 

 require('./ManagerCompetition.php');
 $managerCompetition = new ManagerCompetition();
 $allCompetitions = $managerCompetition->getAllCompetitions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_competition.css">
    <script type="module" src="competition.js"></script> 
    <title>Brief php</title>
</head>
<body>
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
            </tr>
            </thead>
            <tbody>
             <?php foreach ($allCompetitions as $competition) { ?>
                <tr>
                  <td><?php echo $competition->getName(); ?></td>
                  <td><?php echo $competition->getDescription(); ?></td>
                  <td><?php echo $competition->getCity(); ?></td>
                  <td><?php echo $competition->getFormat(); ?></td>
                  <td><?php echo $competition->getCashPrize(); ?></td>
                </tr>
              <?php } ?>
              <?php if (isset($_POST['name'])) { ?>
                <tr>
                  <td><?php echo $_POST['name']; ?></td>
                  <td><?php echo $_POST['description']; ?></td>
                  <td><?php echo $_POST['city']; ?></td>
                  <td><?php echo $_POST['format']; ?></td>
                  <td><?php echo $_POST['cash_prize']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </section>
</body>
</html>
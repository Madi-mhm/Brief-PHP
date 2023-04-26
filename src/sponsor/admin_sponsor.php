<?php 

require('./SponsorManager.php');
$sponsorManager = new SponsorManager();


if(isset($_POST['submit'])){
    $newSponsor = new Sponsor();
    $newSponsor->setBrand($_POST['brand']);

    $sponsorManager->create($newSponsor);

    header('Refresh: 0');

}

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
                        <th>Brand</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($getAllSponsor as $sponsor) { ?>
                        <tr>
                            <td><?php echo $sponsor->getBrand(); ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                <tbody>
            </table>
        </div>
    </section>
</body>
</html>

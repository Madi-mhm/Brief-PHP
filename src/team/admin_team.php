<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin_team.css">
    <title>admin_team</title>
</head>
<body>
    <section class="page">
        <h1>Administration team page</h1>
        <table>
  <caption>Récapitulatif des groupes punk les plus célèbres du Royaume-Uni</caption>
  <thead>
    <tr>
      <th scope="col">Groupe</th>
      <th scope="col">Année de formation</th>
      <th scope="col">Nombre d'albums</th>
      <th scope="col">Morceau le plus célèbre</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Buzzcocks</th>
      <td>1976</td>
      <td>9</td>
      <td><i lang="en">Ever fallen in love (with someone you shouldn't've)</i></td>
    </tr>
    <tr>
      <th scope="row">The Clash</th>
      <td>1976</td>
      <td>6</td>
      <td><i lang="en">London Calling</i></td>
    </tr>

    <!-- quelques lignes supprimées pour condenser le texte -->

    <tr>
      <th scope="row">The Stranglers</th>
      <td>1974</td>
      <td>17</td>
      <td><i lang="en">No More Heroes</i></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th scope="row" colspan="2">Nombre total d'albums</th>
      <td colspan="2">77</td>
    </tr>
  </tfoot>
</table>
    </section>
    <script type="module" src="team.js"></script> 

</body>


</html>
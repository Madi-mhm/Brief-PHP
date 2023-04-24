<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="competition.css">
    <script type="module" src="competition.js"></script> 
    <title>Brief php</title>
</head>
<body>
    <section class="page">
        <form method="POST" action="">
           <h1>Competition</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label>Nom de la compétition</label>
                        <input type="text" name="name" minlength="3" maxlength="50">
                    </div>
                    <div class="boite">
                        <label>Description</label>
                        <input type="text" name="description" minlength="3" maxlength="1000">
                    </div>
                    <div class="boite">
                        <label>Ville</label>
                        <input type="text" name="city" minlength="3" maxlength="50">
                    </div>
                    <div class="boite">
                        <label>Format</label>
                        <input type="text" name="format" minlength="3" maxlength="50">
                    </div>
                    <div class="boite">
                        <label>Récompense</label>
                        <input type="text" name="cash_prize" minlength="3" maxlength="50">
                    </div>

                </div>
            </div>
            <div class="pied-formulaire">
                <button name="submit"><strong>Soumettre</strong></button>
            </div>
           </div>
        </form>
    </section>
</body>


</html>
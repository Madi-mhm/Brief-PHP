<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaire_player.css">
    <title>Brief php</title>
</head>
<body>
    <a href="../../index.php"><button class="homeBtn">Home</button></a>

    <section class="page">
        <form method="POST" action="">
           <h1>Player</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label>First-name</label>
                        <input type="text" name="name" minlength="3" maxlength="50">
                    </div>
                    <div class="boite">
                        <label>Last_name</label>
                        <input type="text" name="description" minlength="3" maxlength="1000">
                    </div>
                    <div class="boite">
                        <label>City</label>
                        <input type="text" name="city" minlength="3" maxlength="50">
                    </div>
                    

                </div>
            </div>
            <div class="pied-formulaire">
                <button name="submit"><strong>submit</strong></button>
            </div>
           </div>
        </form>
    </section>
    <script type="module" src="player.js"></script> 

</body>


</html>
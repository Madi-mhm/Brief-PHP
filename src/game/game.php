<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./game.css">
    <title>Brief php</title>
</head>
<body>
    <section class="page">
        <form method="POST" action="">
           <h1>Game</h1>
           <div class="séparation">
            <div class="corps-formulaire">
                <div class="contenu">
                    <div class="boite">
                        <label>Name</label>
                        <input type="text" name="name" minlength="3" maxlength="50">
                    </div>
                    <div class="boite">
                        <label>Station</label>
                        <input type="text" name="description" minlength="3" maxlength="1000">
                    </div>
                    <div class="boite">
                        <label>Format</label>
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
    <script type="module" src="game.js"></script> 

</body>


</html>
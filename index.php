<?php

include("./dbcalls/conn.php");
include("./dbcalls/read.php");

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets\css\style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Sjabloon</title>
</head>

<body>
    <header>
        <div class="logoafbeelding">
            <img src="assets/img/logo.png" alt="logo" height="125" width="129">
        </div>
        <div class="locatietekst">
            <h1>Heyendaalseweg 98, Nijmegen</h1>
        </div>
        <div class="witborder contactposition">
            <div class="groenborder groenposition">
                <div class="bloktekst contact tekstposition">
                    Contact
                </div>
            </div>
        </div>
        <div class="witborder contactposition contactposition2">
            <div class="groenborder groenposition">
                <div class="bloktekst contact tekstposition tekstposition2">
                    Login
                </div>
            </div>
        </div>
        <div class="kleinwitborder positionkleinbolletje1">
            <div class="kleingroenborder positionkleinbolletje2">
                <div class="winkelwagen">
                    <img src="assets/img/winkelwagen.png" alt="winkelwagen" height="35" width="35">
                </div>
            </div>
        </div>
        <div class="kleinwitborder positionkleinbolletje1 naarrechts1">
            <div class="kleingroenborder positionkleinbolletje2 naarrechts2">
                <div class="winkelwagen naarrechts3">
                    <img src="assets/img/home.png" alt="home" height="35" width="35">
                </div>
            </div>
        </div>
        <form action="./dbcalls/search.php" method="GET">
            <input type="text" name="searchresult" />
            <input type="submit" value="Zoeken" />
        </form>
    </header>
    <main>
        <div class="categorieblokje">
            <img src="assets/img/categorie.png" alt="cat" height="350" width="750">
            <div class="voorgerechtenhoofdtekst categorietekst">
                Voorgerechten
            </div>

            <?php
            //voorgerechten
            foreach ($result as $key => $value) {
                echo '<ul class="voorgerechten inhoudtekst">';
                echo '<li>' . $value['productnaam'];
                echo ' ' .  '(€' . $value['prijs'] . ')' . '</li>';
                echo '</ul>';
            }
            ?>

        </div>
            
        <div class="categorieblokje">
            <img src="assets/img/categorie.png" alt="cat" height="350" width="750">
            <div class="pizzastekst categorietekst">
                Pizza's
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
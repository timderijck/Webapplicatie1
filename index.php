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
            <form action="./dbcalls/search.php" method="GET">
                <div class="searchbar">
                    <div class="searchbarcontainer kleinwitborder2">
                        <input type="text" name="searchresult" placeholder="Jouw gerecht:" id="zoekbalk" />
                    </div>
                    <div class="searchbarcontainer2 kleinwitborder3 kleineruimtesearch">
                        <input type="submit" value="Zoeken" id="zoekknop" />
                    </div>
                </div>
            </form>
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
                <ul class="winkelwagen naarrechts3">
                    <a href="index.php">
                        <img src="assets/img/home.png" alt="home" height="35" width="35">
                    </a>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="categorieblokje">
            <div class="voorgerechtenhoofdtekst categorietekst">
                Voorgerechten
            </div>
            <div class="voorgerechten">

                <?php
                //voorgerechten
                foreach ($voorgerechten as $value) {
                    echo '<ul class="inhoudtekst">';
                    echo '<li>' . $value['productnaam'] . ' (€' . $value['prijs'] . ')</li>';
                    echo '<form action="./dbcalls/delete.php" method="post">';
                    echo '<input type="hidden" name="ID" value="' . $value['ID'] . '">';
                    echo '</form>';
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
        <!-- flex met een juiste grootte flex direction: column/Row-->
        <div class="categorieblokje1">
            <div class="pizzaafbeeldingen">
                <img src="assets/img/categorie.png" alt="cat" height="350" width="750">
                <img src="assets/img/categorie.png" alt="cat" height="350" width="750">
            </div>

            <div class="pizzacontent">
                <div class="pizzastekst categorietekst">Pizza's</div>
                <div class="pizza">
                    <?php
                    foreach ($pizzas as $value) {
                        echo '<ul class="inhoudtekst">';
                        echo '<li>' . $value['productnaam'] . ' (€' . $value['prijs'] . ')</li>';
                        echo '<form action="./dbcalls/delete.php" method="post">';
                        echo '<input type="hidden" name="ID" value="' . $value['ID'] . '">';
                        echo '</form>';
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="pastasblokje">
            <img src="assets/img/categorie.png" alt="cat" height="350" width="750">
            <div class="pastashoofdtekst categorietekst">
                Pasta's
            </div>
            <div class="pasta">

                <?php
                //voorgerechten
                foreach ($pastas as $value) {
                    echo '<ul class="inhoudtekst">';
                    echo '<li>' . $value['productnaam'] . ' (€' . $value['prijs'] . ')</li>';
                    echo '<form action="./dbcalls/delete.php" method="post">';
                    echo '<input type="hidden" name="ID" value="' . $value['ID'] . '">';
                    echo '</form>';
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
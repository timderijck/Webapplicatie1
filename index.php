<?php

include("./dbcalls/conn.php");
include("./dbcalls/read.php");


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="assets/js/validate.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Sjabloon</title>
</head>

<body>
    <?php

    include("./includes/header.php")

    ?>
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
    <?php

    include("./includes/footer.php")

    ?>
</body>

</html>
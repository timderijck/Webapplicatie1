<?php
include("conn.php");

if (isset($_GET["searchresult"])) {
    $searchResult = $_GET["searchresult"];
    if (empty($searchResult)) {
        echo "Please enter a search term.";
        exit;
    }

    $searchTerm = '%' . strtolower($searchResult) . '%';

    $query = "
    SELECT p.Productnaam, p.prijs, 'menuitems' AS source 
    FROM menuitems p
    WHERE LOWER(TRIM(p.Productnaam)) LIKE :product
    UNION
    SELECT pi.Productnaam, pi.prijs, 'pizzas' AS source 
    FROM pizzas pi
    WHERE LOWER(TRIM(pi.Productnaam)) LIKE :product
    UNION
    SELECT px.Productnaam, px.prijs, 'pastas' AS source 
    FROM pastas px
    WHERE LOWER(TRIM(px.Productnaam)) LIKE :product
    ";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":product", $searchTerm);
        $stmt->execute();

        $result = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="assets/js/validate.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <?php include("../includes/header.php"); ?>
    </header>
    <main>
        <div class="zoekresultaten">
            <?php
            if (isset($result) && $result) {
                echo "<h2>Resultaten voor: '" . htmlspecialchars($searchResult) . "'</h2>";
                foreach ($result as $row) {
                    echo '<div>';
                    echo '<strong>' . htmlspecialchars($row['Productnaam']) . '</strong> - €' . htmlspecialchars($row['prijs']);
                    echo ' (Source: ' . htmlspecialchars($row['source']) . ')';
                    echo '</div>';
                }
            } else {
                echo "Geen resultaten gevonden voor '" . htmlspecialchars($searchResult) . "'.";
            }
            ?>
        </div>
    </main>
    <footer>
        <?php include("../includes/footer.php"); ?>
    </footer>
</body>

</html>
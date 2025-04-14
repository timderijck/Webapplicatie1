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

        if ($result) {
            echo "<h2>Search Results:</h2>";
            foreach ($result as $row) {
                echo '<div>';
                echo '<strong>' . htmlspecialchars($row['Productnaam']) . '</strong> - €' . htmlspecialchars($row['prijs']);
                echo ' (Source: ' . htmlspecialchars($row['source']) . ')';
                echo '</div>';
            }
        } else {
            echo "No results found for '" . htmlspecialchars($searchResult) . "'.";
        }
    } catch (PDOException $e) {
        echo 'Query failed: ' . $e->getMessage();
    }
} else {
    echo "No search term provided.";
}
?>
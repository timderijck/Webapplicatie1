<?php

$stmt = $conn->prepare("SELECT * FROM menuitems;");
$stmt->execute();
$result = $stmt->fetchAll();

// voorgerechten
$stmt1 = $conn->prepare("SELECT * FROM menuitems");
$stmt1->execute();
$voorgerechten = $stmt1->fetchAll();

// pizza's
$stmt2 = $conn->prepare("SELECT * FROM pizzas");
$stmt2->execute();
$pizzas = $stmt2->fetchAll();

// pasta's
$stmt3 = $conn->prepare("SELECT * FROM pastas");
$stmt3->execute();
$pastas = $stmt3->fetchAll();
function getAllDishes($conn) {
    $sql = "
        SELECT *, 'menuitems' AS source FROM menuitems
        UNION ALL
        SELECT *, 'pizzas' AS source FROM pizzas
        UNION ALL
        SELECT *, 'pastas' AS source FROM pastas
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

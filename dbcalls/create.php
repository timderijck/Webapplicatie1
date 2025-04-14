<h1>create</h1>
<?php
include ('./conn.php');

//formulier en zet in de variabel product
$product = $_POST['gerecht'];
echo 'dit is mijn productnaam: ' .$product.' <<<<<';
// Het create request
$sql = 'INSERT INTO menuitems, pizzas, pastas(Productnaam) VALUES (:product);';

$stmt = $conn->prepare(query: $sql);
$stmt->bindParam(param: ":product", var: $product);
$stmt->execute();
// $stmt->bindParam(":prijs", 1.5);

//header(header: 'Location:  ../index.php');
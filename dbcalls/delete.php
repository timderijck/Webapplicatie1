<?php
include("./conn.php");

$id = $_POST['ID'];

$stmt = $conn->prepare("DELETE FROM menuitems, pizzas, pastas WHERE ID=:ID");
$stmt->bindParam(":ID", $id);
$stmt->execute();

header('Location: ../index.php');
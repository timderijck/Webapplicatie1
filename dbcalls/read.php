<?php

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
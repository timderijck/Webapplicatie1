<?php
session_start();
include("conn.php");

// Debug log:
file_put_contents("debug.log", print_r($_POST, true), FILE_APPEND);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = :username AND password = :password");
    $stmt->bindParam(":username", $_POST['username']);
    $stmt->bindParam(":password", $_POST['password']); 
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['username'] = $result['username']; 
        header("Location: ../admin.php");
        exit(); 
    } else {
        echo 'boehoe';
        exit(); 
    }
} else {
    echo "Ongeldige toegang.";
    exit();
}

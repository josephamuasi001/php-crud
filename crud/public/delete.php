<?php
require '../config/database.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    
    $stmt = $pdo->prepare(
        "DELETE FROM students
        WHERE id = :id
    ");
    
    $stmt->execute([
        "id" => $id
    ]);

    header("Location: index.php");
    exit;
}

?>
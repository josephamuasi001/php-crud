<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>

<?php 
require '../config/database.php';

$id = $_GET["id"];

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $pdo->prepare(
        "UPDATE students
        SET name = :name,
            age = :age,
            score = :score,
            subject = :subject
        WHERE id = :id
    ");

    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $score = $_POST["score"];
    $subject = $_POST["subject"];

    $stmt->execute([
        "id" => $id,
        "name" => $name,
        "age" => $age,
        "score" => $score,
        "subject" => $subject
    ]);
    
}


$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute(["id" => $id]);
$student = $stmt->fetch();



?>

    <div class="cont">
        <div class="head">
            <h1>Update student details</h1>
            <p>Locate errors and revert them</p>
        </div>

        <form action="edit.php" method="post">
            <label>ID
            <input type="text" name="id" required value="<?= $student["id"] ?>">
        </label>
        <br> <br>
        <label>Name
            <input type="text" name="id" required value="<?= $student["name"] ?>">
        </label>
        <br> <br><label>Age
            <input type="text" name="id" required min="0" value="<?= $student["age"] ?>">
        </label>
        <br> <br><label>Score
            <input type="text" name="id" required min="0" max="100" value="<?= $student["score"] ?>">
        </label>
        <br> <br><label>Subject
            <input type="text" name="id" required value="<?= $student["subject"] ?>">
        </label>
        <br> <br>
        <button type="submit">Update</button>
        </form>
        <a href="index.php">Back</a>
    </div>
</body>
</html>
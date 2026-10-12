<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
</head>
<body>
    <h1>Edit Student Details</h1>
    <p>Update student details</p>

<?php 
require '../config/database.php';

$id = $_GET["id"];

$stmt = $pdo->prepare(
    "SELECT * 
    FROM students
    WHERE id = :id
");

$stmt->execute([
    "id" => $id
]);

$student = $stmt->fetch();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $stmt = $pdo->prepare(
    "UPDATE students
    SET
        name = :name,
        age = :age,
        score = :score,
        subject = :subject 
        WHERE id = :id"
    );

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
        "subject" => $subject,
    ]);

    header("Location: index.php");
    exit;

}
?>

<form action="edit.php" method="POST">
            <input type="hidden" value="<?= $student["id"] ?>" name="id" required>
        <br><br>
        <label>Name:
            <input type="name" name="name" value="<?= $student["name"] ?>" required>
        </label>
        <br><br>
        <label>Age:
            <input type="number" name="age" step="1" required value="<?= $student["age"] ?>" >
        </label>
        <br><br>
        <label>Score:
            <input type="number" name="score" step="1" min="0" max="100" required value="<?= $student["score"] ?>" >
        </label>
        <br><br>
        <label>Subject:
            <input type="name" name="subject" required value="<?= $student["subject"] ?>" >
        </label>
        <br><br>
        <button type="submit" style="cursor: pointer;"> Update Student Info</button>


</form>
</body>
</html>
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

$id = $_GET["id"] ?? null ;
if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $stmt = $pdo->prepare(
        "UPDATE students
        SET name = :name
            age = :age
            score = :score
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
    "subject" => $subject,
]);

header("Location: index.php");
exit;
        
}
        
        
        
$stmt = $pdo->query("SELECT * FROM students WHERE id = :id");
$student = $stmt->fetch();

?>
    <div class="container">
        <div class="header">
            <h1>Edit Students Details</h1>
            <p>Make changes to student details</p>
        </div>

        <form method="POST" action="edit.php?id=<?= $student["id"] ?>">
            <label>ID:
                <input type="name" name="id" required value="<?= $student["id"] ?>">
            </label>
            <br><br>
            <label>NAME:
                <input type="text" name="name" required placeholder="Full name" value="<?= $student["name"] ?>">
            </label>
            <br><br>
            <label>AGE:
                <input type="number" name="age" required placeholder="Age" min="0" max="2000" value="<?= $student["age"] ?>">
            </label>
            <br><br>
            <label>SCORE
                <input type="number" name="score" required placeholder="0 - 100" min="0" max="100" value="<?= $student["score"] ?>" >
            </label>
            <br><br>
            <label>SUBJECT
                <input type="text" name="subject" required placeholder="Course title" value="<?= $student["subject"] ?>">
            </label>
            <br><br>
            <button type="submit">Update</button>
        </form>
        <a href="index.php">Cancel</a>
    </div>
</body>
</html>
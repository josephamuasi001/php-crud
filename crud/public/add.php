<?php 
require '../config/database.php';


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $score = $_POST["score"];
    $subject = $_POST["subject"];

    $stmt = $pdo->prepare("
        INSERT INTO students (id, name, age, score, subject)
        VALUES (:id, :name, :age, :score, :subject)
    ");

    $stmt->execute([
        "id" => $id,
        "name" => $name,
        "age" => $age,
        "score" => $score,
        "subject" => $subject
    ]);


    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <!-- Link layout file matching index hierarchy structure -->
    <link rel="stylesheet" href="../src/add.css">
</head>
<body>

    <!-- Wrapped everything cleanly within a styled card layout container -->
    <div class="form-card">
        <h1>Add Students</h1>
        <p class="subtitle">Create new student records below</p>

        <form action="add.php" method="POST">
            
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" placeholder="e.g., STU001" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Full name" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" step="1" min="1" placeholder="Age" required>
            </div>

            <div class="form-group">
                <label for="score">Score</label>
                <input type="number" id="score" name="score" step="1" min="0" max="100" placeholder="0 - 100" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Course title" required>
            </div>

            <!-- Grouped buttons inside action element layout bar -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">Add Student</button>
                <a href="index.php" class="btn-cancel">Back</a>
            </div>
            
        </form>
    </div>

</body>
</html>

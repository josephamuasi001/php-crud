<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add student</title>
</head>
<body>
<?php 
require '../config/database.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $age = $_POST["age"];
        $score = $_POST["score"];
        $subject = $_POST["subject"];
    $stmt = $pdo->prepare(
        "INSERT INTO students (id, name, age, score, subject)
        VALUES (:id, :name, :age, :score, :subject)"
    );


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
    <div class="container">
        <div class="header">
            <h1>Create student details</h1>
            <p>Add a new student to your database</p>
        </div>
    </div>

    <form action="add.php" method="post">
        <label>ID
            <input type="text" name="id" required>
        </label>
        <br> <br>
        <label>Name
            <input type="text" name="name" required>
        </label>
        <br> <br>
        <label>Age
            <input type="number" name="age" required min="0" >
        </label>
        <br> <br>
        <label>Score
            <input type="number" name="score" required min="0" max="100" step="0.1" >
        </label>
        <br> <br>
        <label>Subject
            <input type="text" name="subject" required>
        </label>
        <br> <br>
        <button type="submit">
            + Add 
        </button>
    </form>
    <a href="index.php">Back</a>

</body>
</html>
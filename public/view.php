<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
</head>
<body>
    <?php
require '../config/database.php';

$stmt = $pdo->prepare(
    "SELECT * 
    FROM students
    WHERE id = :id
");

$id = $_GET["id"];

$stmt->execute([
    "id" => $id
]);

$student = $stmt->fetch();

?>
<h1>View Students Details</h1>
<p><?= $student["name"] ?>, this is your details</p>

<p>ID: <?= $student["id"] ?></p>
<p>Name: <?= $student["name"] ?></p>
<p>Age: <?= $student["age"] ?></p>
<p>Score: <?= $student["score"] ?></p>
<p>Subject: <?= $student["subject"] ?></p>
<a href="edit.php?id=<?= $student["id"] ?>">Edit</a>
<a href="delete.php?id=<?= $student["id"] ?>">Delete</a>
<a href="index.php">Back</a>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <?php 
    require '../config/database.php';
    
    $id = $_GET['id'];

    $stmt = $pdo->prepare(
        "SELECT *
        FROM students
        WHERE id = :id"
    );

    $stmt->execute([
        "id" => $id
    ]);

    $student = $stmt->fetch();
    ?>
    <div class="header">
        <h1>View Student Details</h1>
        <p>Here is your details</p>
    </div>
    <p>ID: <?= $student['id'] ?></p>
    <p>Name: <?= $student['name'] ?></p>
    <p>Age: <?= $student['age'] ?></p>
    <p>Score: <?= $student['score'] ?></p>
    <p>Subject: <?= $student['subject'] ?></p>
    <a href="edit.php?id=<?= $student["id"] ?>">Edit</a>
    <form action="delete.php" method="POST">
        <button type="submit">Delete</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
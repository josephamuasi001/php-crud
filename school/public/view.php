<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>View Student Details</h1>
            <p>Verify that this is your student details</p>
        </div>
    </div>

    <?php 
    require '../config/database.php';
    
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
    
    $id = $_GET["id"];
    $stmt->execute([
        "id" => $id,
    ]);

    $student = $stmt->fetch();

    ?>
    <p>ID: <?= $student["id"] ?></p>
    <p>NAME: <?= $student["name"] ?></p>
    <p>AGE: <?= $student["age"] ?></p>
    <p>SCORE: <?= $student["score"] ?></p>
    <p>SUBJECT: <?= $student["subject"] ?></p>

    <div class="actions">
        <a href="edit.php?id=<?= $student["id"] ?>">EDIT</a>
        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?= $student["id"] ?>">
            <button type="submit">DELETE</button>
        </form>
        <a href="index.php">Back</a>
    </div>
    
</body>
</html>
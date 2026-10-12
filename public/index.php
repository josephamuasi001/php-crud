<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to CRUD</h1>
    <p>This is your updated details</p>

    <a href="add.php">Add Student</a>

    <?php 
    require '../config/database.php';

    

    $stmt = $pdo->query(
        "SELECT *
        FROM students
    ");

    $students = $stmt->fetchAll();
    ?>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Score</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($students as $student): ?>
        <tr>
            <td><?= $student["id"] ?></td>
            <td><?= $student["name"] ?></td>
            <td><?= $student["age"] ?></td>
            <td><?= $student["score"] ?></td>
            <td><?= $student["subject"] ?></td>
            <td><a href="view.php?id=<?= $student["id"] ?>">View</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../src/index.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Student Management System</h1>
            <p>Manage your students details</p>
        </div>
        <a href="add.php" class="add-btn">Add Student</a>
    </div>
    <div class="search">
        <form action="index.php" method="GET">
            <input class="search-input" type="text" name="search" placeholder="Search Student">
            <button class="search-btn" type="submit">Search</button>
        </form>
    </div>
<?php 
require '../config/database.php';
require '../config/grader.php';

if(isset($_GET["search"])) {
    
$search = $_GET["search"];
    $stmt = $pdo->prepare(
        "SELECT * 
        FROM students
        WHERE 
            name LIKE :search
            OR age LIKE :search
            OR score LIKE :search
            OR subject LIKE :search"
    );

    $stmt->execute([
        "search" => "%" . $search . "%"
    ]);
} else {
    $stmt = $pdo->query(
        "SELECT *
        FROM students"
    );
}

$students = $stmt->fetchAll();
    
?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>SCORE</th>
                <th>SUBJECT</th>
                <th>GRADE</th>
                <th>ACTIONS</th>
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
                <td><?= grade($student["score"]) ?></td>
                <td><a href="view.php?id=<?= $student["id"] ?>">View</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
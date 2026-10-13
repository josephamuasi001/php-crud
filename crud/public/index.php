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
            <h1>Welcome to CRUD</h1>
            <p>This is your updated details</p>
        </div>
        <a href="add.php">Add Student</a>
    </div>

    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="Search Student">
        <button type="submit">
            Search
        </button>
    </form>

    <?php 
    require '../config/database.php';

    if(isset($_GET["search"])) {
        $search = $_GET["search"];

    $stmt = $pdo->prepare(
        "SELECT *
        FROM students
        WHERE name LIKE :search
        OR age LIKE :search
        OR score LIKE :search 
        OR subject LIKE :search
    ");

    $stmt->execute(
        [
            "search" => "%" . $search . "%"
        ]
    );

    }else {
        $stmt = $pdo->query(
            "SELECT *
            FROM students
        ");
        
    }
    $students = $stmt->fetchAll();

    function grade(int $score) {
    if($score > 80) {
        return 'A';
    } elseif ($score > 70){
        return 'B';
    } elseif($score > 60) {
        return 'C';
    } elseif($score > 50) {
        return "D";
    } else {
        return "F";
    }
}

    
    ?>


<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Score</th>
            <th>Subject</th>
            <th>Grade</th>
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
            <td><?= grade($student['score']); ?></td>
            <td><a href="view.php?id=<?= $student["id"] ?>">View</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>
</html>
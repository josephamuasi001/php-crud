<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../src/add.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Create Student Details</h1>
            <p>Add a new student</p>
    </div>

    <div class="add-form">
        <form action="add.php" method="POST">
            <div class="input-box">
                <input type="text" name="id" required placeholder="Student ID: eg. STU001..">
            </div>
            <br><br>
            <div class="input-box">
                <input type="text" name="name" required placeholder="Full name">
            </div>
            <br><br>
            <div class="input-box">
                <input type="number" name="age" required placeholder="Age" min="0" max="2000" >
            </div>
            <br><br>
            <div class="input-box">
                <input type="number" name="score" required placeholder="0 - 100" min="0" max="100"  >
            </div>
            <br><br>
            <div class="input-box">
                <input type="text" name="subject" required placeholder="Course title">
            </div>
            <br><br>
            <div class="btn">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
    <br>
    <a href="index.php">Back</a>
</div>

    <?php 
    require '../config/database.php';

    if($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare(
        "INSERT INTO students (id, name, age, score, subject)
        VALUES
        (:id, :name, :age, :score, :subject)
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
    
    ?>
</body>
</html>
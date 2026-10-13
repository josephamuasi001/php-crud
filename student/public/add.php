<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <div class="header">
        <h1>Create Student Details</h1>
        <p>Add a new student</p>
    </div>

    <div class="add-form">
        <form action="add.php" method="POST">
            <label>ID:
                <input type="text" name="id" required placeholder="eg. STU001..">
            </label>
            <br><br>
            <label>NAME:
                <input type="text" name="name" required placeholder="Full name">
            </label>
            <br><br>
            <label>AGE:
                <input type="number" name="age" required placeholder="Age" min="0" max="2000" >
            </label>
            <br><br>
            <label>SCORE
                <input type="number" name="score" required placeholder="0 - 100" min="0" max="100"  >
            </label>
            <br><br>
            <label>SUBJECT
                <input type="text" name="subject" required placeholder="Course title">
            </label>
            <br><br>
            <button type="submit">Create</button>
        </form>
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
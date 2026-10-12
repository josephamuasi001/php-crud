<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
</head>
<body>
    <h1>Add Students</h1>
    <p>Create student data</p>

    <form action="add.php" method="POST">
        <label>ID:
            <input type="name" name="id" required>
        </label>
        <br><br>
        <label>Name:
            <input type="name" name="name" required>
        </label>
        <br><br>
        <label>Age:
            <input type="number" name="age" step="1" required>
        </label>
        <br><br>
        <label>Score:
            <input type="number" name="score" step="1" min="0" max="100" required>
        </label>
        <br><br>
        <label>Subject:
            <input type="name" name="subject" required>
        </label>
        <br><br>
        <button type="submit"> Add Student</button>
        
    </form>
    <a href="index.php">Back</a>

    <?php 
        require '../config/database.php';

        if($_SERVER["REQUEST_METHOD"] === "POST") {

            $id = $_POST["id"];
            $name = $_POST["name"];
            $age = $_POST["age"];
            $score = $_POST["score"];
            $subject = $_POST["subject"];
    
            $stmt = $pdo->prepare("INSERT INTO students (id, name, age, score, subject)
            VALUES 
            (:id, :name, :age, :score, :subject)
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
</body>
</html>
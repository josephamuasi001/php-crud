<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new student</title>
</head>
<body>
    <?php 
    require '../config/database.php';
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $stmt = $pdo->prepare("INSERT INTO students(id, name, age, score, subject)
    VALUES (:id, :name, :age, :score, :subject)
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
    }
    
    ?>
    <h1>Add a new Student Data</h1>
    <p>Include new students to your database</p>

    <form action="add.php" method="post">
        <label>ID
            <input type="text" name="id" required >
        </label>
        <br><br>
        <label>NAME
            <input type="text" name="name" required >
        </label>
        <br><br>
        <label>AGE
            <input type="number" name="age" required >
        </label>
        <br><br>
        <label>SCORE
            <input type="number" name="score" required >
        </label>
        <br><br>
        <label>SUBJECT
            <input type="text" name="subject" required >
        </label>
        <br><br>
        <button type="submit">+ Add</button>
        <a href="index.php">Back</a>

        
    </form>
</body>
</html>
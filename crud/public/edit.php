<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Details</title>
    <!-- Linking your centralized stylesheet -->
    <link rel="stylesheet" href="../src/edit.css">
</head>
<body>

<?php 
require '../config/database.php';

// Safe check if id exists in URL parameter
$id = $_GET["id"] ?? null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("
        UPDATE students
        SET name = :name,
            age = :age,
            score = :score,
            subject = :subject 
        WHERE id = :id
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

// Fetch record down here so validation redirect updates cleanly above it
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute(["id" => $id]);
$student = $stmt->fetch();
?>

    <!-- Wrap layout in a professional form card container -->
    <div class="form-card">
        <h1>Edit Student Details</h1>
        <p class="subtitle">Update student information below</p>

        <!-- Dynamic form actions structure passing down original id to script query string -->
        <form method="POST" action="edit.php?id=<?= htmlspecialchars((string)$id) ?>">            <input type="hidden" value="<?= htmlspecialchars($student["id"]) ?>" name="id">
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($student["name"]) ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" step="1" min="1" value="<?= htmlspecialchars($student["age"]) ?>" required>
            </div>

            <div class="form-group">
                <label for="score">Score</label>
                <input type="number" id="score" name="score" step="1" min="0" max="100" value="<?= htmlspecialchars($student["score"]) ?>" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($student["subject"]) ?>" required>
            </div>

            <!-- Footer Action Row mapping controls and escape pathways -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Student Info</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>

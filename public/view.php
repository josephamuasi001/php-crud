<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
    <!-- Linking your style sheet -->
    <link rel="stylesheet" href="../src/view.css">
</head>
<body>
    <?php
    require '../config/database.php';

    $stmt = $pdo->prepare("
        SELECT * 
        FROM students
        WHERE id = :id
    ");

    $id = $_GET["id"];
    $stmt->execute(["id" => $id]);
    $student = $stmt->fetch();
    ?>

    <!-- Wrap elements in a profile card container -->
    <div class="profile-card">
        <h1>View Student Details</h1>
        <p class="subtitle"><?= htmlspecialchars($student["name"]) ?>, this is your details</p>

        <!-- Use a clean data grid layout instead of stacked paragraphs -->
        <div class="info-group">
            <div class="info-label">ID:</div>
            <div class="info-value"><?= htmlspecialchars($student["id"]) ?></div>

            <div class="info-label">Name:</div>
            <div class="info-value"><?= htmlspecialchars($student["name"]) ?></div>

            <div class="info-label">Age:</div>
            <div class="info-value"><?= htmlspecialchars($student["age"]) ?></div>

            <div class="info-label">Score:</div>
            <div class="info-value"><?= htmlspecialchars($student["score"]) ?></div>

            <div class="info-label">Subject:</div>
            <div class="info-value"><?= htmlspecialchars($student["subject"]) ?></div>
        </div>

        <!-- Action Row for buttons and navigation -->
        <div class="action-row">
            <a href="edit.php?id=<?= $student["id"] ?>" class="btn-edit">Edit</a>
            
            <form action="delete.php" method="POST" class="inline-form" onsubmit="return confirm('Are you sure you want to delete this student?');">
                <input type="hidden" name="id" value="<?= $student["id"] ?>">
                <button type="submit" class="btn-delete">Delete</button>
            </form>
            
            <a href="index.php" class="btn-back">Back</a>
        </div>
    </div>

</body>
</html>

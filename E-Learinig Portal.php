<?php
$conn = new mysqli('localhost', 'root', '', 'elearning');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $fileName);
    $conn->query("INSERT INTO materials (name) VALUES ('$fileName')");
}

$materials = $conn->query("SELECT * FROM materials");
?>

<!DOCTYPE html>
<html>
<body>
    <h1>E-Learning Portal</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload Material</button>
    </form>

    <h2>Materials:</h2>
    <ul>
        <?php while ($row = $materials->fetch_assoc()): ?>
            <li><a href="uploads/<?= $row['name'] ?>" download><?= $row['name'] ?></a></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>


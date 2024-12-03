<?php
$conn = new mysqli('localhost', 'root', '', 'forum');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic = $_POST['topic'];
    $conn->query("INSERT INTO topics (title) VALUES ('$topic')");
}

$topics = $conn->query("SELECT * FROM topics");
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Forum</h1>
    <form method="POST">
        <input type="text" name="topic" placeholder="New Topic" required>
        <button type="submit">Post Topic</button>
    </form>

    <h2>Topics:</h2>
    <ul>
        <?php while ($row = $topics->fetch_assoc()): ?>
            <li><?= $row['title'] ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

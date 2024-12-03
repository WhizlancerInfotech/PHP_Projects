<?php
$conn = new mysqli('localhost', 'root', '', 'task_manager');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $conn->query("INSERT INTO tasks (task, status) VALUES ('$task', 'Pending')");
}

$result = $conn->query("SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Task Manager</h1>
    <form method="POST">
        <input type="text" name="task" placeholder="New Task" required>
        <button type="submit">Add Task</button>
    </form>

    <h2>Tasks:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li><?= $row['task'] ?> - <?= $row['status'] ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

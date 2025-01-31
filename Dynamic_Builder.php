<?php
$fields = ['name', 'email', 'message'];

echo "<form method='POST'>";
foreach ($fields as $field) {
    echo "<label>$field</label><input type='text' name='$field'><br>";
}
echo "<button type='submit'>Submit</button></form>";

if ($_POST) {
    echo "<h2>Form Data:</h2>";
    foreach ($_POST as $key => $value) {
        echo "<p>$key: $value</p>";
    }
}
?>

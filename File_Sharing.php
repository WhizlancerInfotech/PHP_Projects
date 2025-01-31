<?php
if ($_FILES['file']) {
    $file = $_FILES['file'];
    $upload_dir = "uploads/";
    $new_filename = uniqid() . "_" . basename($file["name"]);
    $path = $upload_dir . $new_filename;

    if (move_uploaded_file($file["tmp_name"], $path)) {
        echo "File uploaded successfully!";
    } else {
        echo "Failed to upload file.";
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>

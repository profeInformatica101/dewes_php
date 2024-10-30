<?php
$message = '';
$upload_path = 'uploads/';
$max_size = 5242880; // 5MB en bytes
$allowed_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
$allowed_exts = ['png', 'gif', 'jpg', 'jpeg'];

function create_filename($filename, $upload_path) {
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $i = 1;
    $newname = $basename;
    while (file_exists($upload_path . $newname . '.' . $extension)) {
        $newname = $basename . '-' . $i;
        $i++;
    }
    return $newname . '.' . $extension;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['image']['error'] === 0) {
        if ($_FILES['image']['size'] > $max_size) {
            $message = 'Error: file size is too big!';
        } else {
            $type = mime_content_type($_FILES['image']['tmp_name']);
            if (!in_array($type, $allowed_types)) {
                $message = 'Error: invalid file type!';
            } else {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (!in_array($ext, $allowed_exts)) {
                    $message = 'Error: invalid file extension!';
                } else {
                    $filename = create_filename($_FILES['image']['name'], $upload_path);
                    $destination = $upload_path . $filename;
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                        $message = "Uploaded! <br><img src='$destination'>";
                    } else {
                        $message = 'Could not upload file.';
                    }
                }
            }
        }
    } else {
        $message = 'Error: file upload error code ' . $_FILES['image']['error'];
    }
}
?>
<?= $message ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="image">Upload file:</label>
    <input type="file" name="image" id="image">
    <input type="submit" value="Upload">
</form>

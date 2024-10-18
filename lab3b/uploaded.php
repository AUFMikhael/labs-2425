<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Handle Image File
if (isset($_FILES['image_file'])) {
    $uploaded_image_file = $upload_directory . basename($_FILES['image_file']['name']);
    $temporary_image_file = $_FILES['image_file']['tmp_name'];

    if (move_uploaded_file($temporary_image_file, $uploaded_image_file)) {
        ?>
        <img src="<?php echo $relative_path . basename($_FILES['image_file']['name']); ?>" alt="Uploaded Image" width="300">
        <?php
    } else {
        echo 'Failed to upload image file';
    }
}


echo '<pre>';
var_dump($_FILES);
exit;
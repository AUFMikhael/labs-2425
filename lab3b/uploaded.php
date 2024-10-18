<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Handle PDF File
if (isset($_FILES['pdf_file'])) {
    $uploaded_pdf_file = $upload_directory . basename($_FILES['pdf_file']['name']);
    $temporary_pdf_file = $_FILES['pdf_file']['tmp_name'];

    if (move_uploaded_file($temporary_pdf_file, $uploaded_pdf_file)) {
        ?>
        <embed src="<?php echo $relative_path . basename($_FILES['pdf_file']['name']); ?>" width="600" height="400" type="application/pdf">
        <?php
    } else {
        echo 'Failed to upload PDF file';
    }
}


echo '<pre>';
var_dump($_FILES);
exit;
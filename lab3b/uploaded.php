<?php

$upload_directory = getcwd() . '/uploads/';
$relative_path = '/uploads/';

// Handle Audio File
if (isset($_FILES['audio_file'])) {
    $uploaded_audio_file = $upload_directory . basename($_FILES['audio_file']['name']);
    $temporary_audio_file = $_FILES['audio_file']['tmp_name'];

    if (move_uploaded_file($temporary_audio_file, $uploaded_audio_file)) {
        ?>
        <audio controls>
            <source src="<?php echo $relative_path . basename($_FILES['audio_file']['name']); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <?php
    } else {
        echo 'Failed to upload audio file';
    }
}


echo '<pre>';
var_dump($_FILES);
exit;
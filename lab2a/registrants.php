<?php

// Read and display CSV file data
if (($file = fopen('registrations.csv', 'r')) !== false) {
    echo '<table border="1">';
    echo '<thead><tr><th>Complete Name</th><th>Birthday</th><th>Age</th><th>Contact Number</th><th>Sex</th><th>Program</th><th>Complete Address</th><th>Email Address</th></tr></thead>';
    echo '<tbody>';
    
    while (($data = fgetcsv($file)) !== false) {
        list($fullname, $email, $password, $birthdate, $sex, $address, $contact_number, $program, $agree, $age) = $data;

        // Check if the birthdate is a valid date
        if ($birthdate !== "N/A") {
            try {
                // Calculate the age only if the birthdate is valid
                $birthdateDateTime = new DateTime($birthdate);
                $age = $birthdateDateTime->diff(new DateTime())->y; // Calculate age
            } catch (Exception $e) {
                // Handle invalid date formats
                $age = "N/A";
            }
        } else {
            $age = "N/A";
        }

        echo '<tr>';
        echo '<td>' . htmlspecialchars($fullname) . '</td>';
        echo '<td>' . htmlspecialchars($birthdate) . '</td>';
        echo '<td>' . htmlspecialchars($age) . '</td>';
        echo '<td>' . htmlspecialchars($contact_number) . '</td>';
        echo '<td>' . htmlspecialchars($sex) . '</td>';
        echo '<td>' . htmlspecialchars($program) . '</td>';
        echo '<td>' . htmlspecialchars($address) . '</td>';
        echo '<td>' . htmlspecialchars($email) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    
    fclose($file);
} else {
    echo 'Error opening the file.';
}

?>

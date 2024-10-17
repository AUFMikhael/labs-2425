<?php

require "helpers/helper-functions.php";
session_start(); // Ensure that the session is started

// Retrieve session data (values set in previous pages)
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : "N/A";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "N/A";
$password = isset($_SESSION['password']) ? $_SESSION['password'] : "N/A";
$birthdate = isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : "N/A";
$sex = isset($_SESSION['sex']) ? $_SESSION['sex'] : "N/A";
$address = isset($_SESSION['address']) ? $_SESSION['address'] : "N/A";

// Retrieve the contact number and program from the current form submission
$contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : "N/A";
$program = isset($_POST['program']) ? $_POST['program'] : "N/A";
$agree = isset($_POST['agree']) ? $_POST['agree'] : "N/A";

// Calculate age from birthdate
if ($birthdate !== "N/A") {
    $birthdateDateTime = DateTime::createFromFormat('F j, Y', $birthdate); // Assuming the format is 'F j, Y'
    $currentDate = new DateTime();
    
    // Calculate age
    $age = $currentDate->diff($birthdateDateTime)->y; // Get the difference in years
} else {
    $age = "N/A"; // In case birthdate is not set
}

// Prepare CSV data
$csv_data = [$fullname, $email, $password, $birthdate, $sex, $address, $contact_number, $program, $agree, $age];

// Open the CSV file in append mode
$file = fopen('registrations.csv', 'a');

// Use fputcsv to write the data as a CSV row
if ($file) {
    fputcsv($file, $csv_data);
    fclose($file);
} else {
    echo "Error opening the CSV file.";
}

// Use $_SESSION directly to display the session data
$form_data = $_SESSION; // Assign the session data to the $form_data variable

dump_session();

?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Thank You Page</h1>
      </div>
      <div class="p-section--shallow">
      
        <table aria-label="Session Data">
            <thead>
                <tr>
                    <th></th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Now using the $form_data which holds session data
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td><?php echo $val; ?></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <th>Age</th>
                <td><?php echo $age; ?></td> <!-- Display the calculated age -->
            </tr>
            </tbody>
        </table>
      
        <a href="registrants.php" class="p-button">View All Registrants</a>

      </div>
    </div>
  </div>
</section>

</body>
</html>
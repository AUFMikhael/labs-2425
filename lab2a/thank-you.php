<?php

require "helpers/helper-functions.php";

session_start();

$contact_number = $_POST['contact_number'];
$program = $_POST['program'];
$agree = $_POST['agree'];

$_SESSION['contact_number'] = $contact_number;
$_SESSION['program'] = $program;
$_SESSION['agree'] = $agree;

$form_data = $_SESSION;

if (isset($_SESSION['birthdate'])) {
  $birthdate = $_SESSION['birthdate'];
  $birthdateDateTime = DateTime::createFromFormat('F j, Y', $birthdate); // Assuming the format is 'F j, Y'
  $currentDate = new DateTime();
  
  // Calculate age
  $age = $currentDate->diff($birthdateDateTime)->y; // Get the difference in years
} else {
  $age = "N/A"; // In case birthdate is not set
}

dump_session();

session_destroy();
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
        <h1>
          Thank You Page
        </h1>
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
            foreach ($form_data as $key => $val):
            ?>
                <tr>
                    <th><?php echo $key; ?></th>
                    <td>
                      <?php echo $val; ?>
                    </td>
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
      

      </div>
    </div>
  </div>
</section>

</body>
</html>
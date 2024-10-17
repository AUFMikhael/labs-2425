<pre>
<?php
if (!empty($_POST['firstname'])) {
    // Define the background color based on gender
    $bgColor = ($_POST['sex'] === 'male') ? 'lightcyan' : 'lightpink';

    // Start the table and apply the background color to the name row
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th colspan='2'>Registration Summary</th></tr>";
    echo "<tr style='background-color: $bgColor;'><td>Full Name</td><td>" . $_POST['firstname'] . " " . $_POST['middlename'] . " " . $_POST['lastname'] . "</td></tr>";
    echo "<tr><td>Email</td><td>" . $_POST['email'] . "</td></tr>";
    echo "<tr><td>Phone</td><td>" . $_POST['country_code'] . " " . $_POST['phone_number'] . "</td></tr>";
    echo "<tr><td>Gender</td><td>" . ucfirst($_POST['sex']) . "</td></tr>";
    echo "<tr><td>Birthdate</td><td>" . $_POST['birthdate'] . "</td></tr>";
    echo "<tr><td>Program</td><td>" . $_POST['program'] . "</td></tr>";
    echo "<tr><td>College Department</td><td>" . $_POST['department'] . "</td></tr>";
    echo "<tr><td>Address</td><td>" . $_POST['address'] . "</td></tr>";
    echo "</table>";

    exit;
}
?>
</pre>
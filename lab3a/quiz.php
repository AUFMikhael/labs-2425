<?php

require "helpers.php";

# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Supply the missing code
// Retrieve form data
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = isset($_POST['agree']) ? $_POST['agree'] : 'false';

// Load questions from triviaquiz.json
$questions = retrieve_questions();
?>

<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />

    <script>
        // JavaScript function to auto-submit the quiz form after 60 seconds
        function autoSubmitForm() {
            setTimeout(function() {
                document.getElementById('quiz-form').submit();
            }, 60000); // 60 seconds
        }
        // Call the auto-submit function when the page loads
        window.onload = autoSubmitForm;
    </script>

</head>
<body>
<section class="section">
    <h1 class="title">Quiz</h1>
    <h2 class="subtitle">Answer all the questions below:</h2>

    <!-- Supply the correct HTTP method and target form handler resource -->

    <form id="quiz-form" method="POST" action="result.php">
        <!-- Hidden fields to store user data -->
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />
        <!--
        <input type="hidden" name="answers" />
        -->

        <!-- Display the options -->
        <?php foreach ($questions['questions'] as $index => $question): ?>
            <div class="box">
                <h3 class="title is-5"><?php echo ($index + 1) . ". " . htmlspecialchars($question['question']); ?></h3>
                <?php foreach ($question['options'] as $option): ?>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo $option['key']; ?>" required>
                                <?php echo htmlspecialchars($option['key']) . ". " . htmlspecialchars($option['value']); ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <!-- Start Quiz button -->
        <button type="submit" class="button is-link">Submit Quiz</button>
    </form>
</section>


</body>
</html>
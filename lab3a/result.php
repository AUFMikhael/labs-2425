<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

// Supply the missing code
$complete_name = $_POST['complete_name'] ?? 'N/A';
$email = $_POST['email'] ?? 'N/A';
$birthdate = $_POST['birthdate'] ?? 'N/A';
$contact_number = $_POST['contact_number'] ?? 'N/A';
$agree = $_POST['agree'] ?? 'N/A';
$answers = $_POST['answers'] ?? [];

// Use the compute_score() function from helpers.php
// $score = compute_score($answers);

$score = compute_score($answers);

$hero_class = ($score > 2) ? 'is-success' : 'is-danger';

// Format birthdate 
$formatted_birthdate = date("F d, Y", strtotime($birthdate));

// Retrieve questions and answers
$questions_data = json_decode(file_get_contents('questions/triviaquiz.json'), true);

// Check if the file was loaded successfully and contains the expected keys
if ($questions_data === null || !isset($questions_data['questions'], $questions_data['answers'])) {
    die('Error: Unable to load questions from triviaquiz.json. Please check the file path and structure.');
}

$questions = $questions_data['questions'];
$correct_answers = $questions_data['answers'];

if (count($correct_answers) < count($questions)) {
    die('Error: The number of correct answers does not match the number of questions.');
}

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="hero <?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score: <?php echo $score; ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>

<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo $formatted_birthdate; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Show confetti only if the user scored 5/5 -->
    <?php if ($score === 5): ?>
        <canvas id="confetti-canvas"></canvas>
    <?php endif; ?>

    <!-- Questions and Answers Table -->
    <h2 class="subtitle">Your Answers</h2>
    <table class="table is-bordered is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Question</th>
                <th>Correct Answer</th>
                <th>Your Answer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $index => $question): ?>
                <tr>
                    <td><?php echo htmlspecialchars($question['question']); ?></td>
                    <td><?php echo htmlspecialchars($correct_answers[$index] ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($answers[$index] ?? 'Not answered'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script>
    <?php if ($score === 5): ?>
        var confettiSettings = {
            target: 'confetti-canvas'
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();
    <?php endif; ?>
</script>
</body>
</html>
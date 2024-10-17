<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            const nameInput = document.querySelector('input[name="complete_name"]');
            const emailInput = document.querySelector('input[name="email"]');
            const submitButton = document.querySelector('button[type="submit"]');

            const validateForm = () => {
            if (nameInput.value.trim() === '' || !emailInput.value.includes('@')) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
            };

            nameInput.addEventListener('input', validateForm);
            emailInput.addEventListener('input', validateForm);

            validateForm(); // Initial validation
        });
    </script>
</head>
<body>
<section class="section">
    <h1 class="title">User Registration</h1>
    <h2 class="subtitle">
        This is the IPT10 PHP Quiz Web Application Laboratory Activity. Please register
    </h2>
    <!-- Updated action and method -->
    <form method="POST" action="instructions.php">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" type="text" name="complete_name" placeholder="Complete Name" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" name="email" type="email" required />
            </div>
        </div>

        <div class="field">
            <label class="label">Birthdate</label>
            <div class="control">
                <input class="input" name="birthdate" type="date" required />
            </div>
        </div>

        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input class="input" name="contact_number" type="number" required />
            </div>
        </div>

        <!-- Next button -->
        <button type="submit" class="button is-link">Proceed Next</button>
    </form>
</section>

</body>
</html>
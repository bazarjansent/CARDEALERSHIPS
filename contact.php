<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda Dealership - Contact Us</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="contact">
        <h2>Contact Us</h2>
        <p>Email: info@hondadealership.com</p>
        <p>Phone: (123) 456-7890</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537363153167!3d-37.81627927975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d9d9e9b9c9b!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1634567890123" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <h3>Feedback Form</h3>
        <form action="feedback.php" method="POST">
            <textarea name="feedback" placeholder="Your feedback" required></textarea>
            <select name="contact_preference" required>
                <option value="email">Email</option>
                <option value="phone">Phone</option>
            </select>
            <button type="submit" class="btn">Submit Feedback</button>
        </form>
    </section>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

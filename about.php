<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include realpath(__DIR__ . '/includes/db_connect.php') ?: die('Error: db_connect.php not found');
include realpath(__DIR__ . '/includes/header.php') ?: die('Error: header.php not found');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda Dealership - About Us</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="about">
        <h2>About Honda Dealership</h2>
        <h3>Mission</h3>
        <p>To provide innovative and reliable vehicles that enhance the driving experience.</p>
        <h3>Vision</h3>
        <p>To be the leading car dealership with a commitment to sustainability and customer satisfaction.</p>
        <h3>Our History</h3>
        <p>Founded in 1980, Honda Dealership has been delivering quality vehicles for over four decades.</p>
        <div class="timeline">
            <div class="timeline-item" data-year="1980">Founded</div>
            <div class="timeline-item" data-year="2000">Expanded to 10 locations</div>
            <div class="timeline-item" data-year="2020">Introduced hybrid models</div>
        </div>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

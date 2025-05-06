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
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

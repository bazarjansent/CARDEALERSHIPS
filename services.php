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
    <title>Honda Dealership - Services</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="services">
        <h2>Our Vehicles</h2>
        <div class="car-grid">
            <div class="car-card">
                <img src="assets/images/civic.jpg" alt="Honda Civic">
                <h3>Honda Civic</h3>
                <p>Price: $25,000</p>
                <a href="register.php" class="btn">Order Now</a>
            </div>
            <div class="car-card">
                <img src="assets/images/accord.jpg" alt="Honda Accord">
                <h3>Honda Accord</h3>
                <p>Price: $30,000</p>
                <a href="register.php" class="btn">Order Now</a>
            </div>
            <div class="car-card">
                <img src="assets/images/crv.jpg" alt="Honda CR-V">
                <h3>Honda CR-V</h3>
                <p>Price: $35,000</p>
                <a href="register.php" class="btn">Order Now</a>
            </div>
            <div class="car-card">
               <img src="assets/images/pilot.jpg" alt="Honda Pilot">
               <h3>Honda Pilot</h3>
               <p>Price: $40,000</p>
               <a href="register.php" class="btn">Order Now</a>
            </div>
            <div class="car-card">
               <img src="assets/images/hrv.jpg" alt="Honda HR-V">
               <h3>Honda HR-V</h3>
               <p>Price: $28,000</p>
               <a href="register.php" class="btn">Order Now</a>
            </div>
        </div>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>















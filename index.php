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
    <title>Honda Dealership - Home</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="hero">
        <h1>Welcome to Honda Dealership</h1>
        <p>Discover the joy of driving with our premium Honda vehicles.</p>
        <a href="services.php" class="btn">Explore Our Cars</a>
    </section>
    <section class="search-bar">
        <input type="text" id="search" placeholder="Search for a car...">
        <button onclick="searchCars()">Search</button>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

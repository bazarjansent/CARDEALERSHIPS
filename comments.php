<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include realpath(__DIR__ . '/includes/db_connect.php') ?: die('Error: db_connect.php not found');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO comments (user_id, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("is", $user_id, $comment);
    if ($stmt->execute()) {
        header("Location: user_portal.php");
        exit();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda Dealership - Comments</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include realpath(__DIR__ . '/includes/header.php') ?: die('Error: header.php not found'); ?>
    <section class="form-container">
        <h2>Comment Submitted</h2>
        <p><a href="user_portal.php">Back to Portal</a></p>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

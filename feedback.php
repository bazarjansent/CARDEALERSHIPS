<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include realpath(__DIR__ . '/includes/db_connect.php') ?: die('Error: db_connect.php not found');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = filter_var($_POST['feedback'], FILTER_SANITIZE_STRING);
    $contact_preference = filter_var($_POST['contact_preference'], FILTER_SANITIZE_STRING);
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $sql = "INSERT INTO feedback (user_id, feedback, contact_preference) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("iss", $user_id, $feedback, $contact_preference);
    if ($stmt->execute()) {
        echo "<p>Feedback submitted successfully!</p>";
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
    <title>Honda Dealership - Feedback</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include realpath(__DIR__ . '/includes/header.php') ?: die('Error: header.php not found'); ?>
    <section class="form-container">
        <h2>Feedback Submitted</h2>
        <p><a href="contact.php">Back to Contact</a></p>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = $_POST['feedback'];
    $contact_preference = $_POST['contact_preference'];
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $sql = "INSERT INTO feedback (user_id, feedback, contact_preference) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
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
    <?php include 'includes/header.php'; ?>
    <section class="form-container">
        <h2>Feedback Submitted</h2>
        <p><a href="contact.php">Back to Contact</a></p>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

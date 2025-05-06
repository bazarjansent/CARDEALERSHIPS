<?php
session_start();
include 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO comments (user_id, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
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
    <?php include 'includes/header.php'; ?>
    <section class="form-container">
        <h2>Comment Submitted</h2>
        <p><a href="user_portal.php">Back to Portal</a></p>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

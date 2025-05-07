<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include realpath(__DIR__ . '/includes/db_connect.php') ?: die('Error: db_connect.php not found');
include realpath(__DIR__ . '/includes/header.php') ?: die('Error: header.php not found');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda Dealership - User Portal</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="user-portal">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>!</h2>
        <h3>Leave a Comment</h3>
        <form action="comments.php" method="POST">
            <textarea name="comment" placeholder="Your comment" required></textarea>
            <button type="submit" class="btn">Submit Comment</button>
        </form>
        <h3>Your Comments</h3>
        <?php
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT comment, created_at FROM comments WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['comment']) . " <em>(" . $row['created_at'] . ")</em></p>";
        }
        $stmt->close();
        ?>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

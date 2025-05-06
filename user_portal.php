<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';

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
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
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
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['comment']) . " <em>(" . $row['created_at'] . ")</em></p>";
        }
        $stmt->close();
        ?>
    </section>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

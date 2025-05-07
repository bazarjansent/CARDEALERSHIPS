<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include realpath(__DIR__ . '/includes/db_connect.php') ?: die('Error: db_connect.php not found');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = "SELECT id, fullname, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['fullname'];
            header("Location: user_portal.php");
            exit();
        } else {
            echo "<p>Invalid password.</p>";
        }
    } else {
        echo "<p>Invalid email.</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Honda Dealership - Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include realpath(__DIR__ . '/includes/header.php') ?: die('Error: header.php not found'); ?>
    <section class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="POST" onsubmit="return validateLoginForm()">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>
    </section>
    <?php include realpath(__DIR__ . '/includes/footer.php') ?: die('Error: footer.php not found'); ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>

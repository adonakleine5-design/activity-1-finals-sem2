<?php
session_start();

// Database Connection
$host = "localhost";
$dbname = "user_system";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Access Control — must be logged in
function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

// Access Control — must be admin
function require_admin() {
    require_login();
    if ($_SESSION['role'] !== 'admin') {
        echo "<h3>Access Denied — Admins Only</h3><a href='dashboard.php'>← Go Back</a>";
        exit;
    }
}
?>

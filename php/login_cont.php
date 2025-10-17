<?php 
session_start();
require_once('db.php');

// gather user input
$email = $_POST["email"];
$pass = sha1($_POST["pass"]); // still works but better to use password_hash() later

// Query user
$loginResult = mysqli_query($conn, "SELECT email, pass FROM $table WHERE email = '$email' AND pass = '$pass'");

// Check if user found
if ($loginResult && mysqli_num_rows($loginResult) > 0) {
    header("Location: ../index.html");
    exit();
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: ../login.php");
    exit();
}

mysqli_close($conn);
?>

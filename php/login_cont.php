<?php 
session_start();
require_once('db.php');

// gather user input
$email = $_POST["email"];
$password = $_POST["pass"];

// query user
$result = mysqli_query($conn, "SELECT pass FROM $table WHERE email = '$email'");

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['pass'];

    // verify password securely
    if (password_verify($password, $hashedPassword)) {
        // ✅ login success
        header("Location: ../index.html");
        exit();
    } else {
        // ❌ invalid password
        $_SESSION['error'] = "Invalid password.";
        header("Location: ../login.php");
        exit();
    }
} else {
    // ❌ email not found
    $_SESSION['error'] = "Invalid email.";
    header("Location: ../login.php");
    exit();
}

mysqli_close($conn);
?>

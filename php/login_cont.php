<?php 
session_start();
include 'db.php';

$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = "SELECT email, pass FROM $tableName WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['pass'];

    if (password_verify($pass, $hashedPassword)) {
        header("Location: ../index.html");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password.";
        header("Location: ../login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: ../login.php");
    exit();
}

mysqli_close($conn);
?>
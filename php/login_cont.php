<?php
session_start();
require_once('db.php');

$pepper = "SECRET_PEPPER_123";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['pass'];

$query = "SELECT id, pass, salt FROM $table WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $salt = $row['salt'];
    $stored_hash = $row['pass'];

    // Apply same combination
    $peppered = hash_hmac("sha256", $password, $pepper);
    $salted = $peppered . $salt;

    if (password_verify($salted, $stored_hash)) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid password.";
        header("Location: ../login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid email.";
    header("Location: ../login.php");
    exit();
}

?>

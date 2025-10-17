<?php
require_once('db.php');

// gather user input
$email = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

// hash the password securely
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// check if email already exists
$check = mysqli_query($conn, "SELECT email FROM $table WHERE email = '$email'");
if ($check && mysqli_num_rows($check) > 0) {
  header("Location: ../signup.php");
  exit;
}

// insert new user
$signup = mysqli_query($conn, "INSERT INTO $table (email, pass) VALUES ('$email', '$hashedPassword')");

if ($signup) {
  header("Location: ../login.php");
  exit;
} else {
  $error = addslashes(mysqli_error($conn));
  echo "<script>console.error('Error inserting record: $error');</script>";
}

mysqli_close($conn);
?>

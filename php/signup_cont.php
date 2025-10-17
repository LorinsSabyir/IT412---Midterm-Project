<?php
require_once('db.php');

// gather user input
$email = $_POST["inputEmail"];
$password = sha1($_POST["inputPassword"]);

// Check if email already exists
$check = mysqli_query($conn, "SELECT email FROM $table WHERE email = '$email'");
if ($check && mysqli_num_rows($check) > 0) {
  echo "<script>console.error('Email already exists');</script>";
  exit;
}

// Insert a new record
$signup = mysqli_query($conn, "INSERT INTO $table (email, pass) VALUES ('$email', '$password')");

// checks if the record is inserted
if ($signup) {
  // redirect to signin.php
  header("Location: ../login.php");
  exit;

} else {
  // log error message to console
  $error = addslashes(mysqli_error($conn));
  echo "<script>console.error('Error inserting record: $error');</script>";
}

// closes the sql connection
mysqli_close($conn);
?>

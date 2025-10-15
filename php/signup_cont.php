<?php
include 'db.php';

// gather user input
$email = $_POST["inputEmail"];
$password = password_hash($_POST["inputPassword"], PASSWORD_DEFAULT);

$sql = "INSERT INTO $tableName (email, pass) VALUES ('$email', '$password')";

// checks if the record is inserted
if (mysqli_query($conn, $sql)) {
  echo "<script>console.log('New record created successfully');</script>";

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

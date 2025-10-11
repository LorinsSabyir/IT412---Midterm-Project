<?php 
include 'db.php';

// gather user input
$email = $_POST["email"];
$pass = $_POST["pass"];

$sql = "SELECT email, pass FROM $tableName WHERE email = '$email' AND pass = '$pass'";
$result = mysqli_query($conn, $sql);

// checks if the record is inserted
if (mysqli_num_rows($result) > 0) {
  header("Location: ../index.html");
  exit();
} else {
  $error = "Invalid email or password.";
}

// closes the sql connection
mysqli_close($conn);

?>
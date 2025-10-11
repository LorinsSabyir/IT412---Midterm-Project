<?php
include 'db.php';

// gather user input
$email = $_POST["inputEmail"];
$password = $_POST["inputPassword"];

$sql = "INSERT INTO $tableName (email, pass) VALUES ('$email', '$password')";

// checks if the record is inserted
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully <br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// closes the sql connection
mysqli_close($conn);
?>

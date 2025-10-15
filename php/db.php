<?php
$servername = "localhost";
$username = "root";
$password = "";

// helper function to log to browser console
function console_log($msg) {
  echo "<script>console.log(" . json_encode($msg) . ");</script>";
}

// create connection
$conn = mysqli_connect($servername, $username, $password);

// check connection
if (!$conn) {
  console_log("Connection failed: " . mysqli_connect_error());
  die();
} else {
  console_log("Connected successfully");
}

// checks if database exists; if not, create one
$dbName = "midterm";
$dbResult = mysqli_query($conn, "SHOW DATABASES LIKE '$dbName';");

if ($dbResult && mysqli_num_rows($dbResult) > 0) {
  console_log("Database '$dbName' exists");
} else {
  console_log("Database '$dbName' does not exist");
  $createDb = "CREATE DATABASE $dbName";

  if (mysqli_query($conn, $createDb)) {
    console_log("Database created successfully");
  } else {
    console_log("Error creating database: " . mysqli_error($conn));
  }
}

// select the database
mysqli_query($conn, "USE $dbName");

// checks if table 'user' exists; if not, create one
$tableName = "user";

?>
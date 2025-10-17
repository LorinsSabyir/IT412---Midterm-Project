<?php
$servername = "localhost";
$username = "root";
$password = "";

$db = "midterm";
$table = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if database exists
$dbResult = mysqli_query($conn, "SHOW DATABASES LIKE '$db'");
if (!$dbResult || mysqli_num_rows($dbResult) == 0) {
  // Create database if not found
  if (mysqli_query($conn, "CREATE DATABASE $db")) {
    echo "<script>console.log('Database $db created successfully');</script>";
  } else {
    echo "<script>console.error('Error creating database: " . addslashes(mysqli_error($conn)) . "');</script>";
  }
}

// Select the database
mysqli_select_db($conn, $db);

// Check if table exists
$tableResult = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
if (!$tableResult || mysqli_num_rows($tableResult) == 0) {
  // Create table if not found
  $createTableSQL = "CREATE TABLE `$table` (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(32) NOT NULL,
    pass VARCHAR(32) NOT NULL,
    salt VARCHAR(32)
  )";

  if (mysqli_query($conn, $createTableSQL)) {
    echo "<script>console.log('Table $table created successfully inside database $db');</script>";
  } else {
    echo "<script>console.error('Error creating table: " . addslashes(mysqli_error($conn)) . "');</script>";
  }
}

?>
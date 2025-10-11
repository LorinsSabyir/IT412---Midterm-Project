<?php
$servername = "localhost";
$username = "root";
$password = "";

// create connection
$conn = mysqli_connect($servername, $username, $password);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error() . "<br>");
} else {
  echo "Connected successfully <br>";
}

// checks if database exists; if not, create one
$dbName = "midterm";
$dbResult = mysqli_query($conn, "SHOW DATABASES LIKE '$dbName';");

if ($dbResult && mysqli_num_rows($dbResult) > 0) {
  echo "Database '$dbName' exists <br>";
} else {
  $createDb = "CREATE DATABASE $dbName";
  echo "Database '$dbName' does not exist <br>";

  if (mysqli_query($conn, $createDb)) {
    echo "Database created successfully <br>";
  } else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
  }
}

// select the database
mysqli_query($conn, "USE $dbName");

// checks if table 'user' exists; if not, create one
$tableName = "user";
$tableResult = mysqli_query($conn, "SHOW TABLES LIKE '$tableName'");

if ($tableResult && mysqli_num_rows($tableResult) > 0) {
  echo "Table '$tableName' exists <br>";
} else {
  echo "Table '$tableName' does not exist <br>";

  // SQL to create table 'user'
  $user = "CREATE TABLE $tableName (
    id INT(32) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(32) NOT NULL,
    pass VARCHAR(32) NOT NULL
  )";

  if (mysqli_query($conn, $user)) {
    echo "Table '$tableName' created successfully <br>";
  } else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
  }
}

?>
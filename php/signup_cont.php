<?php
require_once('db.php');

$pepper = "SECRET_PEPPER_123";

$email = mysqli_real_escape_string($conn, $_POST['inputEmail']);
$password = $_POST['inputPassword'];

// Generate unique salt per user
$salt = bin2hex(random_bytes(8));

// Combine password with pepper
$peppered = hash_hmac("sha256", $password, $pepper);

// Add salt
$salted = $peppered . $salt;

// Hash final
$hashedPassword = password_hash($salted, PASSWORD_BCRYPT);

// Insert user
$sql = "INSERT INTO $table (email, pass, salt) VALUES ('$email', '$hashedPassword', '$salt')";
if (mysqli_query($conn, $sql)) {
  header("Location: ../login.php");
  exit();
} else {
  header("Location: ../signup.php");
  exit();
}
?>

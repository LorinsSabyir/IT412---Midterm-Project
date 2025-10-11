<?php 
  $name = $_POST["name"];
  $email = $_POST["email"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
</head>
<body>
  Welcome <?php echo  $name;?><br>
  Your email address is: <?php echo $email; ?>
</body>
</html>
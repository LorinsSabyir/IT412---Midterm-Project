<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/sigin.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
  <title>Login Page</title>
</head>

<body>

  <div class="loginForm container">
    <form action="php/login_cont.php" method="POST">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" name="email" required>
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock" name="pass" required>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      <div class="mb-3">
        <label for="signinLink">Don't have an account?</label>
        <a href="signup.html" class="signinLink">Sign in</a>
    </div>
      <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
      <?php endif; ?>
    </form>
  </div>
    
</body>

<script src="../js/sigin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>

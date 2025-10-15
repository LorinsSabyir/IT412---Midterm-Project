<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign up</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
      :root {
        --bg1: #f8fafc;
        --bg2: #eef6ff;
        --card-radius: 18px;
        --primary1: #06b6d4;
        --primary2: #3b82f6;
      }

      html, body {
        height: 100%;
      }

      body {
        background: linear-gradient(135deg, var(--bg1), var(--bg2));
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      }

      .wrap {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
      }

      .card-form {
        width: 100%;
        max-width: 420px;
        border-radius: var(--card-radius);
        box-shadow: 0 10px 30px rgba(20,30,60,0.08);
        overflow: hidden;
        background: #fff;
      }

      .card-head {
        background: linear-gradient(90deg, var(--primary1), var(--primary2));
        color: #fff;
        padding: 1rem 1.25rem;
      }

      .card-body {
        padding: 1.5rem;
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
      }

      .pw-hint, .form-text-muted, .help-link {
        font-size: 0.9rem;
      }

      .divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #e6eefc, transparent);
        margin: 1.25rem 0;
      }
    </style>
  </head>
  <body>

    <main class="wrap">
      <div class="card-form">
        <div class="card-head d-flex align-items-center">
          <div class="flex-grow-1">
            <h2 class="mb-0">Create an account</h2>
          </div>
        </div>

        <div class="card-body">
          <form name="signup" action="php/signup_cont.php" method="POST" onsubmit="return confirmPass()">

            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="name@example.com" required>
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" minlength="8" required>
              <div id="pwHelp" class="form-text pw-hint">Minimum 8 characters. Use letters and numbers.</div>
            </div>

            <div class="mb-3">
              <label for="inputConfirmPassword" class="form-label">Confirm password</label>
              <input type="password" id="inputConfirmPassword" class="form-control" required>
              <div id="message" class="form-text text-danger mt-1" aria-live="polite"></div>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-primary btn-lg">Create account</button>
            </div>

            <div class="divider"></div>

            <div class="text-center">
              <small class="text-muted">Already have an account?</small>
              <div><a href="login.php">Log in</a></div>
            </div>

            <?php if (!empty($error)): ?>
              <div class="alert alert-danger mt-3" role="alert">
                <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
              </div>
            <?php endif; ?>

          </form>
        </div>
      </div>
    </main>

    <script>
      function confirmPass() { 
        const pass = document.forms["signup"]["inputPassword"].value;
        const confirmPass = document.forms["signup"]["inputConfirmPassword"].value;
        const msg = document.getElementById("message");
        msg.innerHTML = "";
        if (pass !== confirmPass) {
          msg.innerHTML = "Passwords don't match!";
          return false;
        }
        return true;
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

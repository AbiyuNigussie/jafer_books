<?php
session_start();

if (
  !isset($_SESSION['user_id']) &&
  !isset($_SESSION['username'])
) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Login | JaferBooks</title>
    <link rel="stylesheet" href="../../public/css/adminLogin.css" />
  </head>

  <body>
    <div class="cont">
      <h2>Login</h2>
      <div class="Admin">
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert">
            <p>
              <?= htmlspecialchars($_GET['error']); ?>
            </p>

          </div>

        <?php } ?>
        <form action="../middleware/auth.php" method="POST">
          <br />
          <label for="username">email</label><br />
          <input type="text" placeholder="please enter a email" class="input" name="email" /><br />
          <label for="password">password</label><br />
          <input type="password" placeholder="please enter a password" class="input" name="password" /><br /><br />
          <button class="btn">Login</button><br /><br />
        </form>
      </div>
    </div>
  </body>

  </html>

<?php
} else {
  header("Location: admin.php");
  exit;
}
?>
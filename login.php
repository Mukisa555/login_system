<?php
session_start();
require 'db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: welcome.php");
        exit;
    } else {
        $error = "❌ Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>

    <?php if ($error): ?>
      <div class="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
      </div>

      <div class="form-group checkbox-group">
        <input type="checkbox" id="showPassword" onclick="togglePassword()">
        <label for="showPassword">Show Password</label>
      </div>

      <button type="submit" class="btn">Login</button>
    </form>

    <p class="signup-link">
      Don't have an account?
      <a href="register.php">Register</a>
    </p>
  </div>

  <script>
    function togglePassword() {
      const pwd = document.getElementById('password');
      pwd.type = (pwd.type === 'password') ? 'text' : 'password';
    }
  </script>
</body>
</html>

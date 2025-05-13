<?php
require 'db.php';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);

    if ($stmt->rowCount() > 0) {
        $error = "❌ Username or email already exists.";
    } else {
        $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($insert->execute([$username, $email, $password])) {
            $success = "✅ Registration successful. You can now <a href='login.php'>login</a>.";
        } else {
            $error = "❌ Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Student Registration</h2>

    <?php if ($error): ?>
      <div class="alert"><?php echo $error; ?></div>
    <?php elseif ($success): ?>
      <div class="alert" style="color: green;"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" class="login-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input name="username" id="username" type="text" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" required>
      </div>

      <button type="submit" class="btn">Register</button>
    </form>

    <p class="signup-link">
      Already have an account?
      <a href="login.php">Login</a>
    </p>
  </div>
</body>
</html>

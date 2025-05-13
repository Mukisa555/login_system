<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .header {
      background-color: #2563eb;
      color: white;
      padding: 1rem;
      text-align: center;
    }

    .dashboard {
      margin: 2rem auto;
      padding: 2rem;
      max-width: 600px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
    }

    .dashboard h2 {
      margin-bottom: 1rem;
      color: #1f2937;
    }

    .dashboard p {
      color: #4b5563;
      font-size: 1rem;
    }

    .logout-btn {
      display: inline-block;
      margin-top: 1.5rem;
      padding: 0.6rem 1.2rem;
      background-color: #ef4444;
      color: white;
      border: none;
      border-radius: 4px;
      text-decoration: none;
      font-size: 0.9rem;
      transition: background-color 0.2s ease;
    }

    .logout-btn:hover {
      background-color: #b91c1c;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h1>
  </div>

  <div class="dashboard">
    <h2>Student Home Page</h2>

    <a class="logout-btn" href="logout.php">Logout</a>
  </div>
</body>
</html>

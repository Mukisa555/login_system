<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-green-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded shadow-md text-center">
        <h1 class="text-2xl font-bold mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <a href="logout.php" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
    </div>
</body>
</html>

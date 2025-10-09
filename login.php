<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $usersFile = 'users.json';
  if (!file_exists($usersFile)) {
    die('User data file not found.');
  }

  $users = json_decode(file_get_contents($usersFile), true);
  if ($users === null) {
    die('Error reading user data.');
  }

  $foundUser = null;
  foreach ($users as $user) {
    if ($user['username'] === $username) {
      $foundUser = $user;
      break;
    }
  }

  if ($foundUser) {
    if ($password === $foundUser['password']) {
        echo "<p style='color:green; text-align:center;'>Login successful.</p>";
        echo "<script>
            localStorage.setItem('username', '" . htmlspecialchars($username, ENT_QUOTES) . "');
            window.location.href = 'chat.php'; // Redirect to chat page
        </script>";
        exit;

    } else {
        echo "<p style='color:red; text-align:center;'>Incorrect password.</p>";
    }
  } else {
    echo "<p style='color:red; text-align:center;'>User not found.</p>";
  }
}



    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <header class="text-center text-light">
      <h1>Sign Up Page</h1>
  </header>
    <nav class="text-center">
    <a class="btn btn-primary" href="index.php" role="button">Index</a>
    <a class="btn btn-primary" href="chat.php" role="button">Chat</a>
  </nav>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <h3 class="card-title text-center mb-4">Log In</h3>
          <form method="POST" action="">
            
            <!-- Username -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <!-- Redirect User to login -->
            <div id="emailHelp" class="form-text">
              Don't have an account? <a href="signup.php">Sign up here</a>
            </div>
            <!-- Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


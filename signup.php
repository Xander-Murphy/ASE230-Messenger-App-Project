<?php
$filepath = 'users.json';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email    = trim($_POST['email']);
  $password = trim($_POST['password']);

  if (!empty($username) && !empty($email) && !empty($password)) {
    $jsonData = $jsonData = file_get_contents($filepath);
    $users = json_decode($jsonData, true);
    if (!is_array($users)) {
      $users = [];
    }
  }
  else {
    $users = [];
  }

  $users[] = [
    "username" => $username,
    "email" => $email,
    "password" => $password
  ];

  if (file_put_contents($filepath, json_encode($users, JSON_PRETTY_PRINT))) {
    echo "<p style='color:green; text-align:center;'>Sign up successful!</p>";
  }
  else {
    echo "<p style='color:red; text-align:center;'>Error saving user data.</p>";
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
          <h3 class="card-title text-center mb-4">Sign Up</h3>
          <form method="POST" action="">
            
            <!-- Username -->
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            
            
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <!-- Redirect User to login -->
            <div id="emailHelp" class="form-text">
              Already have an account? <a href="login.html">Sign in here</a>
            </div>
            <!-- Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Sign Up</button>
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

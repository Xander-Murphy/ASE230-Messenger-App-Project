<?php
date_default_timezone_set('America/New_York');
$siteName = "230-Messenger";
$tagline = "A simple and secure chat application";

$hour = date("H");
if ($hour < 12) {
  $greeting = "Good Morning";
} else {
  $greeting = "Good Evening";
}

$developers = [
  ["name" => "Jarred Engleman", "role" => "NKU", "link" => "https://www.linkedin.com/in/jarred-engleman-799793267", "platform" => "LinkedIn"],
  ["name" => "Xander Murphy", "role" => "NKU", "link" => "https://www.linkedin.com/in/xander-murphy/", "platform" => "LinkedIn"],
  ["name" => "Jack Dixon", "role" => "NKU", "link" => "https://github.com/J4K20", "platform" => "GitHub"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $siteName; ?> | Index</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100 text-light bg-dark">

  <main class="container-fluid">
    <div class="row">

      <aside class="col-2 bg-secondary p-3 min-vh-100 text-center">
        <h4><?php echo $siteName; ?></h4>
        <nav class="mb-3">
          <a class="btn btn-primary w-100 mb-2" href="chat.php" role="button">Chat</a>
          <a class="btn btn-primary w-100 mb-2" href="signup.php" role="button">Sign Up</a>
          <a class="btn btn-primary w-100 mb-2" href="login.php" role="button">Login</a>
          <a class="btn btn-primary w-100 mb-2" href="admin.php" role="button">Admin Panel</a>
          <a class="btn btn-primary w-100 mb-2" href="index.php" role="button" onclick="signOut()">Sign Out</a>
        </nav>
        <p class="text-light small">
          <?php echo $greeting; ?>!<br>
          <?php echo date("l, F jS, Y"); ?>
        </p>
      </aside>

      <section class="col-10 py-4 px-5">
        <header class="mb-4 text-center">
          <h1>Welcome to <?php echo $siteName; ?></h1>
          <p class="lead"><?php echo $tagline; ?></p>
        </header>

        <hr class="border-light">

        <section class="mb-5">
          <h2>About the App</h2>
          <p>
            <strong><?php echo $siteName; ?></strong> is a web-based messaging app created as part of our ASE 230 midterm project. This project demonstrates a understanding of php and bootstrap styling to create a functioning chat interface.
          </p>
        </section>

        <section class="mb-5">
          <h2>Features</h2>
          <ul class="list-group list-group-flush text-start">
            <li class="list-group-item bg-dark text-light">Messaging between users</li>
            <li class="list-group-item bg-dark text-light">Secure login and signup system</li>
            <li class="list-group-item bg-dark text-light">Organized message storage using JSON</li>
            <li class="list-group-item bg-dark text-light">Clean and responsive Bootstrap UI</li>
          </ul>
        </section>

        <section class="mb-5">
          <h2>Getting Started</h2>
          <ol class="text-start">
            <li>Click <strong>Sign Up</strong> to simply and easily create a account!</li>
            <li>Login to access the interface!</li>
            <li>Begin chatting with other users!</li>
          </ol>
          <a href="signup.php" class="btn btn-primary mt-3">Get Started</a>
        </section>

        <section>
          <h2>Developers</h2>
          <p>Developed by:</p>
          <div class="row justify-content-center">
            <?php foreach ($developers as $dev): ?>
              <div class="col-md-3 m-2">
                <div class="card bg-secondary text-light border-0 shadow-sm">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $dev["name"]; ?></h5>
                    <p class="card-text"><?php echo $dev["role"]; ?></p>
                    <a href="<?php echo $dev["link"]; ?>" target="_blank" class="btn btn-light btn-sm"><?php echo $dev["platform"]; ?></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>

        <hr class="border-light my-5">

        <footer class="text-center">
          <p><?php echo $siteName; ?> | ASE 230 Midterm Project</p>
        </footer>
      </section>

    </div>
  </main>
</body>
<script>
  function signOut() {
    localStorage.removeItem("username");
    window.location.href = 'index.php'
  }
</script>
</html>

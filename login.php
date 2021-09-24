<?php
session_start();

// if (isset($_SESSION["login"])) {
//   header("Location: index.php");
// }

require 'functions.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Log In</title>
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
  <h1>Halaman Log In</h1>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style:italic;">Username / password salah</p>
  <?php endif; ?>

  <form action="" method="POST">
    <ul>
      <li>
        <label for="username">Email : </label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
      </li>
      <form id="comment_form" action="responses.php" method="post">
        <div class="g-recaptcha" data-sitekey="6LeKD10cAAAAAN494PmOrI7jK77gZYkUyzkruI32" style="margin: bottom 10px;"></div><br>
        <!-- <input type="submit" name="submit" value="Submit"> -->
      </form>
      <li>
        <button type="submit" name="login">Log In</button>
      </li>
      <p>Don't have an account? Register<a href="registrasi.php"> here</a></p>
    </ul>

  </form>
</body>

</html>
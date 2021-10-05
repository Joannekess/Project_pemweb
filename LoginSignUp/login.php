<?php
session_start();

// if (isset($_SESSION["login"])) {
//   header("Location: index.php");
// }

require 'functions2.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user3 WHERE email = '$username'");

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
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light sticky-top" id="nav">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="css/images/News.png" alt="" width="60" height="60">
          </a>
          <a class="btn" href="#" role="button">SignUp</a>
          </button>
        </div>
      </nav>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style:italic;">Username / password salah</p>
  <?php endif; ?>
  <div class="main">
  <div class="container">
  <div class="title">
      <img src="/css/images/title.png" alt="">
  </div>
  <div class="login">
       <h1>LOGIN</h1>          
  <form action="" method="POST">
    <ul>
      <li>
        <label for="username">Email </label><br>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">Password </label><br>
        <input type="password" name="password" id="password">
      </li>
      <form id="comment_form" action="responses.php" method="post">
        <div class="g-recaptcha" data-sitekey="6LeKD10cAAAAAN494PmOrI7jK77gZYkUyzkruI32" style="margin: bottom 10px;"></div><br>
        <!-- <input type="submit" name="submit" value="Submit"> -->
      </form>
        <button type="submit" name="login" class="btnLogin">Log In</button>
      
      <p class="textmini">Don't have an account? Register<a href="registrasi.php"> here</a></p>
    </ul>

  </form>
</div>
</div>
      </div>

      <script>
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("nav").style.padding = "0px";
  } else {
    document.getElementById("nav").style.padding = "3px";
  }
}
</script>

</body>

</html>
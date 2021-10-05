<?php
require 'functions2.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan!');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Halaman Registrasi</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <style>
    label {
      display: block;
    }

    li {
      list-style-type: none;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default" style="background-color: lightblue;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="color: black;" href="#">[ IF635 ] Web Programming</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a>Student</a></li>
      </ul>
    </div>
  </nav>

  <form action="" method="POST" style="width: 30%;">
    <ul>
      <li class="group-form">
        <label for="firstname">First Name : </label>
        <input type="text" name="firstname" id="firstname" class="form-control" required placeholder="Insert Your First Name">
      </li>
      <li>
        <label for="lastname">Last Name : </label>
        <input type="text" name="lastname" id="lastname" class="form-control" required placeholder="Insert Your Last Name">
      </li>
      <li class="group-form">
        <label for="username">Email/Username : </label>
        <input type="text" name="username" id="username" class="form-control" required placeholder="Insert Your Email/Username">
      </li>
      <li class="group-form">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Insert Your Password">
      </li>
      <li class="group-form">
        <label for="password2">Konfirmasi Password : </label>
        <input type="password" name="password2" id="password2" class="form-control" required placeholder="Insert Your Password">
      </li>
      <li class="group-form">
        <label for="tanggal_lahir">Date Of Birth : </label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
      </li>
      <li>
        <label for="gender" class="form-check-label">Gender : </label>
        <select name="gender" id="gender">
          <option value="">--Gender--</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <!-- <input type="radio" name="gender" id="gender" class="form-check-input" required> Male
        <input type="radio" name="gender" id="gender" class="form-check-input" required> Female -->
      </li>
      <li>
        <label for="pp">Profile Picture</label>
        <input type="file" name="pp" id="pp">
      </li>
      <br>
      <form id="comment_form" action="responses.php" method="post">
        <div class="g-recaptcha" data-sitekey="6LeKD10cAAAAAN494PmOrI7jK77gZYkUyzkruI32" style="margin: bottom 10px;"></div><br>
        <!-- <input type="submit" name="submit" value="Submit"> -->
      </form>
      <button type="submit" name="register" class="btn btn-success">Sign Up</button>

      <a href="login.php">
        <button type="button" name="back" class="btn btn-info" style="color:black;">Back to Log In</button>
      </a>
      <!-- <button class="btn btn-info"><a href="index.php" style="color:black;">Back to Log In</a></button> -->
    </ul>
  </form>

</body>

</html>
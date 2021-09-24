<?php
// session_start();

// // set error to true untuk pertama kali masuk
// if (!isset($_SESSION["login"])) {
// 	$_SESSION = false;
// } else {
// 	$_SESSION = null;
// }

require 'functions.php';
$news = query("SELECT * FROM news");

// if (isset($_POST["login"])) {
// 	$username = $_POST["username"];
// 	$password = md5($_POST["password"]);

// 	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

// 	// cek username
// 	if (mysqli_num_rows($result) === 1) {

// 		// cek password
// 		$row = mysqli_fetch_assoc($result);
// 		if ($password==$row["password"]) {
// 			// set session
// 			$_SESSION["login"] = true; // true => password = salah
// 			$error = null;
// 		} else {
// 			$_SESSION["login"] = false; // false => password = betul
// 			$error = true;
// 			$_SESSION = true;
// 		}
// 	}

// 	$error = true;
// }
// if (isset($_POST["logout"])) {
// 	session_destroy();
// 	header("Location: tampilanumum.php");
// }
?>

<!DOCTYPE html>
<html>

<head>
	<title>News List</title>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- javascript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>


<body>
	<!-- 
    <script>
		<?php if (!isset($_SESSION["login"])) { ?>

			$(document).ready(function() {
				$('#myModal').modal({
					keyboard: false,
					show: true,
					backdrop: 'static'
				});
			});

		<?php } else { ?>

			$(document).ready(function() {
				$('#myModal').modal({
					keyboard: false,
					show: false,
					backdrop: 'static'
				});
			});

		<?php } ?>
	</script> 
    -->

    <!-- Modal -->
	<div class="modal" id="myModal" role="dialog" style="background-color: rgba(0,0,0,0.5);">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign In</h4>
				</div>
				<div class="modal-body">

					<form action="" method="POST">
						<ul style="list-style-type: none; text-align: left;" class="px-0">
							<li class="group-form">
								<label for="username">Email </label>
								<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Email">
							</li>
							<li class="group-form">
								<label for="password">Password </label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
							</li>
							<li class="justify-content-end d-flex pt-2">
								<br>
								<button type="submit" name="login" class="btn btn-primary">Sign In</button>
							</li>
							<?php if (isset($error)) : ?>
								<p style="color: red; font-style:italic;">Email tidak terdaftar atau password salah. Silahkan coba lagi</p>
							<?php endif; ?>
							<p>Don't have an account? Register<a href="registrasi.php"> here</a></p>
						</ul>
					</form>

				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="#[IF 635] WEB PROGRAMMING" class="navbar-brand">[IF 635] WEB PROGRAMMING</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="tampilanumum.php">News <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<form class="form-inline my-2 my-lg-0" action="" method="post">
					<button class="float-right btn btn-outline-danger" type="submit" id="login" name="logout">Logout</button>
				</form>
			</ul>
			<span class="navbar-text">
				<!-- insert text here... -->
			</span>
		</div>
	</nav>
	<div class="jumbotron">
		<h2>News List</h2>
	</div>
	<table id="news" class="table table-striped table-bordered" style="width:100%">
		<button type="button" class="btn btn-primary float-right" onclick="location.href = 'addNews.php' "><i class="fas fa-plus-circle"></i>News</button>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Penulis</th>
				<th>Konten</th>
				<th>Tanggal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($news as $row) : ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['judul']; ?></td>
					<td><?php echo $row['kategori']; ?></td>
					<td><?php echo $row['penulis']; ?></td>
					<td><?php echo $row['konten']; ?></td>
					<td><?php echo $row['tanggal']; ?></td>
					<td style="display: flex;">
						<form action="update.php" method="POST" style="margin-right: 10px;">
                            <input type="hidden" name="idupdate" value="<?php echo $row['idnews'] ?>">
                            <button class="btn btn-success" type="submit">Update</button>
                        </form>
                        <form action="delete.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $row['idnews'] ?>">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete <?php echo $row['judul']?>?');">Delete</button>
						</form>
					</td>

				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>

		</tbody>
	</table>

	<script>
		$(document).ready(function() {
			$('#news').DataTable();
		});
	</script>

</body>

</html>
<?php 
// session_start();

// if (!isset($_SESSION["login"])) {
//     header("location: tampilanumum.php");
//     exit;
// }

	require 'functions.php';

	//input data to database
	if(isset($_POST['submit'])) {

		if (addNews($_POST) > 0) {
			echo "
				<script>
					alert('Data successfully added!');
					window.location.href = 'tampilanumum.php';
				</script>";
		} else {
			echo 
				"<script>
					alert('failed to add data!');
				</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Form Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="sticky-top navbar navbar-light bg-dark">
		<ul class="nav nav-pills">
		  <li class="nav-item">
		    <a class="nav-link active" href="#">Add Student</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="tampilanumum.php">Student List</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#"></a>
		  </li>
		</ul>
</nav>
	<div class="jumbotron">
		<h2>GERCEP NEWS</h2>
		<h3>Paling Up - to date</h3>
	</div>
		<form action="" method="POST">
			<div class="form-group col-4">
					<label for="judul">Judul</label>
					<input class="form-control form-control-sm" type="text" name="judul" id="judul" placeholder="Input Judul" required>
			</div>
            <div class="form-group col-4">
                <label for="kategori">Kategori</label>
                <select class="form-control form-control-sm" name="kategori" id="kategori" required>
                    <option value="National">National</option>
                    <option value="International">International</option>
                    <option value="Local">Local</option>
                    <option value="Regional">Regional</option>
                    <option value="Business & Financial">Business & Financial</option>
                    <option value="Economic News">Economic News</option>
                    <option value="Entertainment & Celebrities">Entertainment & Celebrities</option>
                    <option value="Health & Education">Health & Education</option>
                    <option value="Arts & Culture">Arts & Culture</option>
                    <option value="Sports news">Sports news</option>
                    <option value="Politics">Politics</option>
                    <option value="Science & Tech">Science & Tech</option>
                </select>
            </div>
                <div class="form-group col-4">
					<label for="penulis">Penulis</label>
					<input class="form-control form-control-sm" type="text" name="penulis" id="penulis" placeholder="Input Penulis" required>
			</div>
                <div class="form-group col-4">
					<label for="konten">Konten</label>
					<input class="form-control form-control-sm" type="text" name="konten" id="konten" placeholder="Input Konten" required>
			</div>
                <div class="form-group col-4">
					<label for="tanggal">Tanggal</label>
					<input class="form-control form-control-sm" type="date" name="tanggal" id="tanggal" max="9999-12-31" placeholder="Input Tanggal" required>
			</div>
			<div class="form-group col-4">
					<button class="btn btn-success" type="submit" name="submit">Submit</button>
					<a href="tampilanumum.php">
						<button type="button" name="cancel" class="btn btn-info">Cancel</button>
					</a>
			</div>
		</form>
	</div>
</body>
</html>
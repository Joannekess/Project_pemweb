<?php
// session_start();

// if (!isset($_SESSION["login"])) {
// 	header("location: challenge.php");
// 	exit;
// }

require 'functions.php';

//get data
if(isset($_POST['idupdate'])){
	$id = $_POST['idupdate'];
	$news = query("SELECT * FROM news WHERE idnews = $id")[0];
}

//query data

$conn = mysqli_connect("localhost", "root", "", "pemwebuts");

//update data in database
if (isset($_POST["submit"])) {

	if (update($_POST) > 0) {
		echo "
				<script>
					alert('Data successfully updated!');
					window.location.href = 'tampilanumum.php';
				</script>";
	} else {
		echo
		"<script>
					alert('failed to update data!');
				</script>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Edit Student Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<nav class="sticky-top navbar navbar-light bg-dark">
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link active" href="#">Edit Student</a>
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
		    <input type="hidden" name="idnews" value="<?php echo $news['idnews']; ?>">
			<div class="form-group col-4">
					<label for="judul">Judul</label>
					<input class="form-control form-control-sm" type="text" name="judul" id="judul" placeholder="Input Judul" value="<?php echo $news['judul']; ?>" required>
			</div>
            <div class="form-group col-4">
                <label for="kategori">Kategori</label>
                <select class="form-control form-control-sm" name="kategori" id="kategori" value="<?php echo $news['kategori']; ?>" required>
                    <option selected disabled value="">Pilih Kategori</option>
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
					<input class="form-control form-control-sm" type="text" name="penulis" id="penulis" placeholder="Input Penulis" value="<?php echo $news['penulis']; ?>" required>
			</div>
                <div class="form-group col-4">
					<label for="konten">Konten</label>
					<input class="form-control form-control-sm" type="text" name="konten" id="konten" placeholder="Input Konten" value="<?php echo $news['konten']; ?>" required>
			</div>
                <div class="form-group col-4">
					<label for="tanggal">Tanggal</label>
					<input class="form-control form-control-sm" type="date" name="tanggal" id="tanggal" max="9999-12-31" placeholder="Input Tanggal" value="<?php echo $news['tanggal']; ?>" required>
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
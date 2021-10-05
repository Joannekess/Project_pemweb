<?php  
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pemwebuts";

	//connect to database
	$conn = mysqli_connect($host, $username, $password, $dbname);

	function query($query) {
		global $conn;
		
		$result = mysqli_query($conn, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function addNews($data) {
		global $conn;

		// $idnews = htmlspecialchars($data["idnews"]);
		$judul = htmlspecialchars($data["judul"]);
		$kategori = htmlspecialchars($data["kategori"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$konten = htmlspecialchars($data["konten"]);
		$tanggal = htmlspecialchars($data["tanggal"]);

		//query insert data
		$query = "INSERT INTO news VALUES('', '$judul', '$kategori', '$penulis', '$konten', '$tanggal')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn); 
	}

	function delete($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM news WHERE idnews = $id");

		return mysqli_affected_rows($conn);
	}

	function update($data) {
		global $conn;

		// $idnews = $data["idnews"];
		$idnews = htmlspecialchars($data["idnews"]);
		$judul = htmlspecialchars($data["judul"]);
		$kategori = htmlspecialchars($data["kategori"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$konten = htmlspecialchars($data["konten"]);
		$tanggal = htmlspecialchars($data["tanggal"]);

		//query update data
		$query = "UPDATE news 
				  SET 
				  	  judul = '$judul', 
				  	  kategori = '$kategori',
				  	  penulis = '$penulis',
				  	  konten = '$konten',
				  	  tanggal = '$tanggal'
				  WHERE idnews = $idnews;
				  ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn); 
	}
?>
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

	function addStudent($data) {
		global $conn;

		$ID = htmlspecialchars($data["ID"]);
		$FirstName = htmlspecialchars($data["FirstName"]);
		$LastName = htmlspecialchars($data["LastName"]);
		$Description = htmlspecialchars($data["Description"]);

		//query insert data
		$query = "INSERT INTO student VALUES('$ID', '$FirstName', '$LastName', '$Description')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn); 
	}

    //
	function delete($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM student WHERE ID = $id");

		return mysqli_affected_rows($conn);
	}

    //
	function update($data) {
		global $conn;

		$id = $data["id"];
		$ID = htmlspecialchars($data["ID"]);
		$FirstName = htmlspecialchars($data["FirstName"]);
		$LastName = htmlspecialchars($data["LastName"]);
		$Description = htmlspecialchars($data["Description"]);

		//query update data
		$query = "UPDATE student 
				  SET ID ='$ID', 
				  	  FirstName = '$FirstName', 
				  	  LastName = '$LastName', 
				  	  Description = '$Description'
				  WHERE ID = $id;
				  ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn); 
	}


?>
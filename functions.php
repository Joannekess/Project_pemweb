<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pemwebw4");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function add($data)
{
    global $conn;

    $studentid = htmlspecialchars($data["StudentID"]);
    $firstname = htmlspecialchars($data["FirstName"]);
    $lastname = htmlspecialchars($data["LastName"]);

    // query insert data
    $query = "INSERT INTO datam
                VALUES
              ('', '$studentid', '$firstname', '$lastname')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM datam WHERE StudentID = $id");

    return mysqli_affected_rows($conn);
}


function update($data)
{
    global $conn;

    $id = htmlspecialchars($data["ID"]);
    // $studentid = htmlspecialchars($data["StudentID"]);
    $firstname = htmlspecialchars($data["FirstName"]);
    $lastname = htmlspecialchars($data["LastName"]);

    // query insert data
    $query = "UPDATE datam SET 
                FirstName = '$firstname',
                LastName = '$lastname'
              WHERE ID = $id
              ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar');
          </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
          </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}

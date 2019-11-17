<?php
include "index.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];

// sql to delete a record
$sql = "DELETE FROM memberships_table WHERE email = '$email'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	echo "<br>";	
	
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
	
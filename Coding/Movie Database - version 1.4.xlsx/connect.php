<!--  This is used to connect to the database "movies" -->
<?php
$user = "root";
$password = "";
$database = "movies";
$host = "localhost";
$conn = mysqli_connect($host, $user, $password, $database) or die("Cannot connect");
?>

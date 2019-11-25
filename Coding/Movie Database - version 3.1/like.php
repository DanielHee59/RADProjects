<?php
include 'index.php';
	
$user = "root";
$password = "";
$database = "movies";
$host = "localhost";

//Connect to database
$conn = mysqli_connect($host, $user, $password, $database) or die("Cannot connect");
	//Query for dislike and like to update the number of like and dislike when user clicked with like or dislike
	$likequery = "UPDATE movies_table SET likes = likes + 1 WHERE id = '$_POST[id]'";
	$dislikequery = "UPDATE movies_table SET dislikes = dislikes + 1 WHERE id = '$_POST[id]'";
	
if(isset($_POST['like'])){
	
if(mysqli_query($conn,$likequery))	
	//Open likeanalyticdisplay.php when user clicked like
	header('Location: likeanalyticdisplay.php');
	exit;	
}
if(isset($_POST['dislike'])){
	if(mysqli_query($conn,$dislikequery))
	
	

	//Open dislikeanalyticdisplay.php when user clicked dislike
	header('Location: dislikeanalyticdisplay.php');
	exit;
}
mysqli_close($conn);

?>
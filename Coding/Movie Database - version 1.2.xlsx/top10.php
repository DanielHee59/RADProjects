<?php
	
	header('Content-Type: application/json');
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		
	}
	
	require('connect.php');
	
	$sql = sprintf("SELECT title, numofsearch FROM movies_table ORDER BY numofsearch
				DESC LIMIT 10");
	$result = mysqli_query($conn,$sql);
	
	$data = array();
	foreach($result as $row)
	{
		$data[] = $row;
	}
	
	$result->close();
	mysqli_close($conn);
	
	print json_encode($data);
?>

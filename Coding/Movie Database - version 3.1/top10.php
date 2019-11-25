<?php

include "index.php";

	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

$array = array();

try{	
		// Create connection
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $conn->prepare("SELECT title, numofsearch FROM movies_table WHERE numofsearch >= 1 ORDER BY numofsearch DESC LIMIT 10");
		// executing query
		$query->execute();
		// to fetch the data into array
		$result = $query->fetchAll(PDO::FETCH_OBJ);
			foreach($result as $row) {
				//label as in x axis and y as in y axis as seaches 
				array_push($array, array("label"=> $row->title, "y"=> $row->numofsearch));
			}
			$conn = null;
	}
	catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "<a href=\"top10.html\">Go Back</a>";
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top 10 Most Search"
	},
	axisX: {
		title: "Movies Title"
		
	},
	axisY: {
		title: "Search numbers"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc 
		
		dataPoints: <?php echo json_encode($array, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  


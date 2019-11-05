<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

}
// Connect to database
    $connection = mysqli_connect("localhost","root","","movies");

//Check Connection
    if (!$connection){
        die("Connection failed:" .mysqli_connect_error());
    }

    $sql = "SELECT * FROM movie_list";
    $result = $connection->query($sql);
    echo "<h2>Movies</h2>";

    echo "<br><a href = 'index.html'>Back</a></br>";

    if ($result->num_rows > 0){

        echo "<table class = 'centre' border=1>";

        //Display header
        echo "<tr>
                <th>ID </th>
                <th>Title   </th>
                <th>Studio  </th>
                <th>Status  </th>
                <th>Sound   </th>
                <th>Versions</th>
                <th>Price   </th>
                <th>Rating  </th>
                <th>Year    </th>
                <th>Genre   </th>
                <th>Aspect  </th>
            </tr>";

		while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" .$row['id'] ."</td>";
            echo "<td>" .$row['title'] ."</td>";
            echo "<td>" .$row['studio']. "</td>";
            echo "<td>" .$row['status']. "</td>";
            echo "<td>" .$row['sound']. "</td>";
            echo "<td>" .$row['versions']. "</td>";
            echo "<td>" .$row['price']. "</td>";
            echo "<td>" .$row['rating']. "</td>";
            echo "<td>" .$row['year']. "</td>";
            echo "<td>" .$row['genre']. "</td>";
            echo "<td>" .$row['aspect']. "</td>";
            echo "</tr>";
		}
	}
 
   
   
  
    mysqli_close($connection);

    include "./templates/head.php"; 
    
?>

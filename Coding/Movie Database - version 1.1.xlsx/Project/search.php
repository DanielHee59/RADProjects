<?php

$title = $_POST['title'];

if($_SERVER["REQUEST_METHOD"]=="POST"){

}
// Connect to database
    $connection = mysqli_connect("localhost","root","","movies");

//Check Connection
    if (!$connection){
        die("Connection failed:" .mysqli_connect_error());
    }
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    $sql = "SELECT * FROM movie_list WHERE title LIKE '%$title%' AND genre LIKE '%$genre%' AND rating LIKE '%$rating%' AND year LIKE '%$year%'";
    $sql2 = "UPDATE movie_list SET numberofsearch = numberofsearch +1 WHERE title = '$title'";
    $result = $connection->query($sql);
    $result2 = $connection->query($sql2);

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
    else{
        echo "No movie found";
    }

    if ($result2 == TRUE){
        echo "$title, increment by 1";
    }
    else{
        echo "Error updating record" . $connection ->error;
    }  
 
   mysqli_close($connection);   
    include "./templates/head.php"; 
?>
<?php
    echo "<br><a href = 'Search.html'>Back</a></br>";
    
?>
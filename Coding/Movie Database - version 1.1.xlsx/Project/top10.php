<?php
header('Content-Type: application/json');

if($_SERVER["REQUEST_METHOD"]=="POST"){

}
// Connect to database
    $connection = mysqli_connect("localhost","root","","movies");

//Check Connection
    if (!$connection){
        die("Connection failed:" .mysqli_connect_error());
    }

    $sql = sprintf("SELECT title,numberofsearch FROM movie_list ORDER BY numberofsearch DESC LIMIT 10");

    $result = $connection->query($sql);

    //loop through the returned data
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    $result->close();
    $connection->close();

            
print json_encode($data);

?>

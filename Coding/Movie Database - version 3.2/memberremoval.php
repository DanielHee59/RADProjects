<?php
include "index.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];

$check = mysqli_query($conn, "SELECT id FROM memberships_table WHERE email = '$email'");

//if a result was returned it means that a email of that user already exists in the db
if (mysqli_num_rows($check) > 0)
{
    // sql to delete a record
    $sql = "DELETE FROM memberships_table WHERE email = '$email'";

    //If connection and sql is TRUE
    if (mysqli_query($conn, $sql))
    {
        //Send Message "Record Deleted Successfully"
        echo "Record deleted successfully";
        echo "<br>"; //This <br> tag to enter line breaks
        //<br> tag is useful for writing addresses or poems.
        
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}
else
{
    //if user does not exist, the this message will be shown
    echo "<h4>$email does not exists in the database.</h4>
        <br><br>
        Go <a href='AdminLoginGUI.php'>back</a> and try again</p>";
    //This link allows you to go back and try again but you need to login again.
    //
    
}

//Close Connection
mysqli_close($conn);
?>

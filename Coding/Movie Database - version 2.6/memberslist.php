<?php
	include "index.php";
	
	require('connect.php');
//create a table with heading of ID, Name,Email
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Options</th></tr>";

//table format that loop traversal thru all the tree node.
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
//connection required database details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

//create connection to database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//display all from memberships table
    $stmt = $conn->prepare("SELECT * FROM memberships_table"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
//capture any error message
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
//close connection
$conn = null;
echo "</table>";
echo "<br>";
//hyperlink back to AdminLogin page	
echo "Back to <a href=AdminLoginGUI.php>Admin</a> page";
?>
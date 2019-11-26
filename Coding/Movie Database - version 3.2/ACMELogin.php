<?php
include "index.php";

$servername = "localhost"; //Server Name
$username = $_POST['username']; // receive information when Acme personnel fill their information on
$password = $_POST['password']; // receive information when Acme personnel fill their information on
$dbname = "movies"; //database Name
try
{
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>		
<html>
		<!--When ACME Personnel login sucessfully, there will be -->
		<form action="likeanalytic.php" method="post"> 
		<fieldset>
		<legend>Show Like Analytic</legend> <!--<legend> tag is used to designate a caption for <fieldset> element-->
		<input type="submit" name="submit" value="Show Like"> <!--This a button to show like bargraph-->
		</fieldset>		
		</form>	
		<br>	
		<form action="dislikeanalytic.php" method="post"> 
		<fieldset>
		<legend>Show Dislike Analytic</legend> <!--<legend> tag is used to designate a caption for <fieldset> element-->
		<input type="submit" name="submit" value="Show dislike"> <!--This a button to show dislike bargraph-->
		</fieldset>		
		</form>		
		</html>
<?php
} //display error message
catch(PDOException $e)
{
    echo "Incorrect Password or Name";
} //back to previous page
echo "<a href= 'ACMELoginGUI.php'>Back</a>"
?>

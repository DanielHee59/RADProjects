<?php
include "index.php";

$servername = "localhost"; //Server Name
$username = $_POST['username']; // receive information when admin fill their information on
$password = $_POST['password']; // receive information when admin fill their information on
$dbname = "movies"; //database Name
try
{
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>		
<html>
		<!--When admin login sucessfully, there will be two button to Show All User or Removing a Member from Newsletter-->
		<form action="memberslist.php" method="post"> 
		<fieldset>
		<legend>Show users</legend> <!--<legend> tag is used to designate a caption for <fieldset> element-->
		<input type="submit" name="submit" value="Show user"> <!--This a button to show all member who subscribed-->
		</fieldset>		
		</form>	
		<br>
		<fieldset>
		<legend>Member Removal</legend> <!--<legend> tag is used to designate a caption for <fieldset> element-->
		<form action="memberremoval.php" method="post">
		<div class="container">
		<label for="email"><b>Email address : </b></label><br>
		<input type="email" placeholder="xxxx@gmail.com" name="email" required> 
		<br>		
		<input type="submit" name="submit" value="Remove"/> <!--This a button to remove member who unsubscribed-->
		</div>
		</form>
		</fieldset>
		</html>
<?php
} //display error message
catch(PDOException $e)
{
    echo "Incorrect Password or Name";
} //back to previous page
echo "<a href"
?>

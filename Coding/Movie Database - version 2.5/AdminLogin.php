<?php
	include "index.php";	

		//Both this will receive information when admin fill their information on 
		//AdminLoginGUI's username and password textfield
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == "admin" && $password == "admin") //If both username and password = "admin", send a message "Login Succesfully"
		{
			echo "<p>Login Successfully</p>"; 
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
		}	
		else //If admin username and password are incorrect, then send a message "Login Unsuccesful"
			echo "<p>Login unsuccessful!</p>";
			echo "<br>";	
			echo "<a href=AdminLoginGUI.php>Go back</a>"; //This created a link which are directed to AdminLoginGUI.php with a caption "Go Back"
		
?>
		


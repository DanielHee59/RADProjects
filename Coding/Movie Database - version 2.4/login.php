<?php
	include "index.php";	

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == "admin" && $password == "admin")
		{
			echo "<p>Login successfully</p>"; 
?>		
<html>
		<form action="memberslist.php" method="post">
		<fieldset>
		<legend>Show users</legend>
		<input type="submit" name="submite" value="Show user">
		</fieldset>		
		</form>	
		<br>
		<fieldset>
		<legend>Member Removal</legend>
		<form action="memberremoval.php" method="post">
		<div class="container">
		<label for="email"><b>Email address : </b></label><br>
		<input type="email" placeholder="xxxx@gmail.com" name="email" required>
		<br>		
		<input type="submit" name="submit" value="Remove"/>
		</div>
		</form>
		</fieldset>
		</html>
<?php
		}	
		else
			echo "<p>Login unsuccessful!</p>";
			echo "<br>";	
			echo "<a href=AdminLogin.php>Go back</a>";
		
?>
		


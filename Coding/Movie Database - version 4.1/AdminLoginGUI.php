<?php
include "index.php";
?>
<html lang="en">
     <head>
         <meta charset = "UTF-8">
         <title>Project - Movies</title>
		 <!--This will used the style that are being created at RAD-design.css-->
         <link rel = "stylesheet" type = "text/css" href = "RAD-design.css">
     </head>

		<h1> Admin Login </h1>
		<body>	
		<!--<fieldset> is used to draw a box around related elements-->
			<fieldset>
			<legend>Login</legend>
			<form action="AdminLogin.php" method="post">
			<!--<div> tag defines a division or a section in an HTML Document-->
				<div class="container">
				<!-- Label for username -->
				<label for="username"><b>Username: </b></label><br>
				<!-- TextField for Username -->
				<input type="text" placeholder="Enter Username" name="username" required>
				<br>
				<!--Label for Password-->
				<label for="password"><b>Password: </b></label><br>
				<!--TextField for Password-->
				<input type="password" placeholder="Enter Password" name="password" required>
				<br>
				<!--A login button that submit admin information to verify/
					Username and Password will be posted to AdminLogin.php-->
				<input type="submit" name="submit" value="Login" data-toggle='tooltip'title='Click to login'/>
			</div>
			</form>
			</fieldset>			
		</body>
	</html>

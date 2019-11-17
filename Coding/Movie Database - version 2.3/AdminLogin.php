<?php
include "index.php";
?>
     <head>
         <meta charset = "UTF-8">
         <title>Project - Movies</title>
         <link rel = "stylesheet" type = "text/css" href = "RAD-design.css">
     </head>

		<h1> Admin Login </h1>
		<body>	
			<fieldset>
			<legend>Login</legend>
			<form action="login.php" method="post">
				<div class="container">
				<label for="username"><b>Username: </b></label><br>
				<input type="text" placeholder="Enter Username" name="username" required>
				<br>
				<label for="password"><b>Password: </b></label><br>
				<input type="password" placeholder="Enter Password" name="password" required>
				<br>
				<input type="submit" name="submit" value="Login"/>
			</div>
			</form>
			</fieldset>			
		</body>
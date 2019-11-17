
<?php
include "head.php";
?>
<h1>Movies</h1>
<body>
	<!--  9 Nov 2019  -->
<link rel = "stylesheet" type = "text/css" href = "RAD-design.css">
<!--13 November 2019 - javascript-->
<script src="js/navbar.js"></script>
<!--This provides instruction to browser on how to control the page's dimensions and scalling -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<header></header>
		<nav>
		<ul>
				<li><a href="index.php">Home</a><li>
				<li><a href="search.php">Search</a><li>
				<li><a href="showAllMovies.php">Show all movies</a><li>
				<li><a href="top10.html">Top 10 Movies</a><li>
				<li class="dropdown">
					<a href="javascript:void(0)" class="dropbtn">
						Memberships</a>
  					<div class="dropdown-content">
						<a href="signup.php">Sign Up</a>
						<a href="unsubscribe.php">Unsubscribe</a>
					</div>
				</li>
				<li><a href="AdminLogin.php">Admin</a></li>
		</ul>
		</nav>
</body>
</html>
<?php
include "head.php";
?>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153088624-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153088624-1');
</script>
</head>
<style>
/* All Errors will be in colour Red. This is used when subscribing*/
.error {color: #FF0000;} 
</style>
<h1>Movies Database</h1>
<body>


	<!--  9 Nov 2019  -->
<link rel = "stylesheet" type = "text/css" href = "RAD-design.css">
<!--13 November 2019 - javascript-->
<script src="js/navbar.js"></script>
<!--This provides instruction to browser on how to control the page's dimensions and scalling -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<header></header>
		<nav> <!-- <nav> tag defines a set of navigation links-->
		<ul> <!--Unordered Lists-->
		<!--<li> elements between the opening and closings-->
				<!--<a href></a> defines the URL of the link-->
				<li><a href="index.php">Home</a><li>
				<li><a href="search.php">Search</a><li>
				<li><a href="showAllMovies.php">Show all movies</a><li>

				<li class="dropdown">
				<!--The misuse the anchor element in place of the button element-->
					<a href="javascript:void(0)" class="dropbtn">
						Top 10</a>
					<!--This class holds the actual dropdown content-->
  					<div class="dropdown-content">
						<a href="top10.html">Top 10 Movies</a>
					</div>
				</li>

				<li class="dropdown">
				<!--The misuse the anchor element in place of the button element-->
					<a href="javascript:void(0)" class="dropbtn">
						Real Time</a>
					<!--This class holds the actual dropdown content-->
  					<div class="dropdown-content">
						<a href="likeanalytic.php">Top 10 Liked Movies</a>
						<a href="dislikeanalytic.php">Top 10 Disliked Movies</a>
					</div>
				</li>

				<li class="dropdown">
				<!--The misuse the anchor element in place of the button element-->
					<a href="javascript:void(0)" class="dropbtn">
						Memberships</a>
					<!--This class holds the actual dropdown content-->
  					<div class="dropdown-content">
						<a href="subscribe.php">Subscribe</a>
						<a href="unsubscribe.php">Unsubscribe</a>
					</div>
				</li>

				<li class="dropdown">
				<!--The misuse the anchor element in place of the button element-->
					<a href="javascript:void(0)" class="dropbtn">
						Login</a>
					<!--This class holds the actual dropdown content-->
  					<div class="dropdown-content">
						<a href="AdminLoginGUI.php">Admin</a>
						<a href="ACMELoginGUI.php">ACME Personnel</a>
					</div>
				</li>
				
		</ul>
</nav>
</body>
</html>

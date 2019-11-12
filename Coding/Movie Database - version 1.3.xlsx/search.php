<?php
	include "index.php";
		if(!isset($_POST['submit']))
	{
?>
	<h1> Search Movies </h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class='centre'>
			<label for="text">Title      :</label>
			<input type="text" name="title">
			<br>
			<label for="text">Genre :</label>
			<input type="text" name="genre">
			<br>
			<label for="text">Rating:</label>
			<input type="text" name="rating">
			<br>
			<label for="text">Year     :</label>
			<input type="text" name="year">
			<label for="submit">&nbsp;</label>
			<br>
			<input type="submit" name="submit" value="Submit"/>
		</form>
<?php
	}
	else
	{
		$title = $_POST['title'];
		$genre = $_POST['genre'];
		$rating = $_POST['rating'];
		$year = $_POST['year'];
		
		require('connect.php');
	
	
    $result = mysqli_query($conn, "SELECT * FROM movies_table WHERE title LIKE '%$title%' AND genre LIKE '%$genre%' AND rating LIKE '%$rating%' AND year LIKE '%$year%'");
    $result2 = mysqli_query($conn,"UPDATE movies_table SET numofsearch = numofsearch +1 WHERE title = '$title'");
		
		if(mysqli_num_rows($result) > 0)
		{
			echo "<h1>Movies List</h1>";
			echo "<table class = 'center' border=1>";
			echo "<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Studio</th>
					<th>Status</th>
					<th>Sound</th>
					<th>Versions</th>
					<th>Price</th>
					<th>Rating</th>
					<th>Year</th>
					<th>Genre</th>
					<th>Aspect</th>
				</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td>$row[5]</td>
					<td>$row[6]</td>
					<td>$row[7]</td>
					<td>$row[8]</td>
					<td>$row[9]</td>
					<td>$row[10]</td>
					</tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "No movie found in the list";
		}
		
		if($result2 == true)
		{
			echo "$title, incremented by 1";
		}
		else
		{
			echo "Error updating record", mysqli_error($conn);
		}
			mysqli_close($conn);
	}
		echo "<br><p><a href = 'search.php'>Go back and search again</a></p>";
	?>
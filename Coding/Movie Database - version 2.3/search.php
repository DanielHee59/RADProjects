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
		//connect to database
		require('connect.php');
	
	//sql statement shows how we get the data from database
    $result = mysqli_query($conn, "SELECT * FROM movies_table WHERE title LIKE '%$title%' AND genre LIKE '%$genre%' AND rating LIKE '%$rating%' AND year LIKE '%$year%'");
    $result2 = mysqli_query($conn,"UPDATE movies_table SET numofsearch = numofsearch +1 WHERE title = '$title'");
		//show data if the result is available
		if(mysqli_num_rows($result) > 0)
		{
			echo "<h1>Movies List</h1>";
			echo "<table class = 'center' border=1>";
			echo "<thead>
				<tr>
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
				</tr>
				</thead>";
			
			while($row = mysqli_fetch_array($result))
			{
				// Modified 12/11/2019
				// data-label - This  is used to display the heading when its view in a smaller screensizes
				echo "<tbody>
					<tr>
					<td data-label='ID'>$row[0]</td>
					<td data-label='Title'>$row[1]</td>
					<td data-label='Studio'>$row[2]</td>
					<td data-label='Status'>$row[3]</td>
					<td data-label='Sound'>$row[4]</td>
					<td data-label='Versions'>$row[5]</td>
					<td data-label='Price'>$row[6]</td>
					<td data-label='Rating'>$row[7]</td>
					<td data-label='Year'>$row[8]</td>
					<td data-label='Genre'>$row[9]</td>
					<td data-label='Aspect'>$row[10]</td>
					</tr>
					</tbody>";
			}
			echo "</table>";
		}
		else
		{
			//tell user if the searched movie is not in the database
			echo "No movie found in the list";
		}
		//number of search will auto incremented by 1 when the movie was searched
		if($result2 == true)
		{
			echo "$title, incremented by 1";
			echo "<br><p><a href = 'search.php'>Go back and search again</a></p>";
		}
		else
		{
			echo "Error updating record", mysqli_error($conn);
			echo "<br><p><a href = 'search.php'>Go back and search again</a></p>";
		}
			mysqli_close($conn);
	}

	?>
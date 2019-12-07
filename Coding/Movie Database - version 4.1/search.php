<?php
include "index.php";
if (!isset($_POST['submit'])) // if submit button pressed

{
?>
<html lang="en">
<br>
	<!--<fieldset> is used to draw a box around related elements-->
	<fieldset>
			<legend>Search for a Movies</legend>		
	<!-- post the entered information into below php coding-->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class='centre'>
		<!--<div> tag defines a division or a section in an HTML Document-->
		<div class="container">
		<!-- label for title-->
			<label for="text">Title  :</label> <br>
			<input type="text" placeholder="Search via Title" name="title">
			<br>
			<!-- label for genre-->
			<label for="text">Genre :</label> <br>
			<input type="text" placeholder="Search via Genre" name="genre">
			<br>
			<!-- label for rating-->
			<label for="text">Rating:</label> <br>
			<input type="text" placeholder="Search via Rating" name="rating">
			<br>
			<!-- label for year-->
			<label for="text">Year     :</label> <br>
			<input type="text" placeholder="Search via Year" name="year"> <br>
			<!-- label for submit-->
			<label for="submit">&nbsp;</label> 
			<br>
			<!-- button for submit-->
			<input type="submit" name="submit" value="Submit" data-toggle="tooltip" title="Click to search for a Movie" />
		</div>
		</form>
		</fieldset>	
	</html>
<?php
}
else
{
    //capture entered information from text box
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $year = $_POST['year'];
    //connect to database
    require ('connect.php');

    //sql statement to get any relevant input from user
    $result = mysqli_query($conn, "SELECT * FROM movies_table WHERE title LIKE '%$title%' AND genre LIKE '%$genre%' AND rating LIKE '%$rating%' AND year LIKE '%$year%'");
    //sql statement to update number of search of every valid searched title
    $result2 = mysqli_query($conn, "UPDATE movies_table SET numofsearch = numofsearch +1 WHERE title = '$title'");
    //show data if the result is available
    if (mysqli_num_rows($result) > 0)
    {
        //Table Title
        echo "<h1>Movies List</h1>";
        //table format
        echo "<table class = 'center' border=1>";
        //create heading for every column required in the table
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
					<th>Likes</th>
					<th>Dislikes</th>
				</tr>
				</thead>";

        while ($row = mysqli_fetch_array($result))
        {
            // Modified 12/11/2019
            // data-label - This  is used to display the heading when its view in a smaller screensizes/
			//create a button beside Likes and Dislikes column to rates the movie
			//Toltips - The Tooltip plugin is small pop-up box that appears when the user moves the mouse pointer over an element

            echo "<tbody>					
					<tr><form action=like.php method=post>				
					<td data-label='ID'>$row[0]<input type ='hidden' name='id' value='$row[0]'></input></td>			
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
					<td data-label='Likes'>$row[12]
					<input type='submit' name='like' value ='Like' data-toggle='tooltip' title='Click to like this Movie''></input></td>						
					<td data-label='Dislike'>$row[13] 
					<input type='submit' name='dislike' value='Dislike' data-toggle='tooltip' title='Click to dislike this Movie'></input></td>
					</form></tr>					
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
    if ($result2 == true)
    {
        echo "$title, incremented by 1";
        echo "<br><p><a href = 'search.php'>Go back and search again</a></p>";
    }
    else
    {
        //error message if is invalid search to update the number of search`
        echo "Error updating record", mysqli_error($conn);
        //back to search page
        echo "<br><p><a href = 'search.php'>Go back and search again</a></p>";
    }
    //connection close
    mysqli_close($conn);
}

?>

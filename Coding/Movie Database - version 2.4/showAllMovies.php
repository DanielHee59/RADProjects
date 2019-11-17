<?php
include "index.php";
?>

	<h1> All Movies </h1>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	}
		require('connect.php');
		$result = mysqli_query($conn, "SELECT *from movies_table");
		if(mysqli_num_rows($result) > 0)
		{
			echo"<table class = 'center' border=1>";
				echo "<thead>
						<tr>
							<th>ID </th>
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
			while($row = mysqli_fetch_row($result))
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
			mysqli_free_result($result);
			mysqli_close($conn);
?>

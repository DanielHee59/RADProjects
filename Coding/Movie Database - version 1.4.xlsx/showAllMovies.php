<?php
include "index.php";
?>
		<h1> All Movies </h1>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	}
		//use connect.php to connect to the database
		require('connect.php');
		
		//if connection is successfully, select all columns from the table called movies_table
		$result = mysqli_query($conn, "SELECT *from movies_table");
		if(mysqli_num_rows($result) > 0)
		{
			//This created a table and this is the heading for each row
			echo"<table class = 'center' border=1>";
				echo " <tr>
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
						</tr>";
						
			//This will extract the data from database and inside it to its respective row
			while($row = mysqli_fetch_row($result))
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
			
			mysqli_free_result($result);
			//Close the Connection
			mysqli_close($conn);
?>

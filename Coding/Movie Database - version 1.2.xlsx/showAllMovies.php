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
			mysqli_close($conn);
?>

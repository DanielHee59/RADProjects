<?php
include "index.php";

if (isset($_POST['unsubscribe'])) 
{
	//captures the entered email
    $email = $_POST['email'];

    //connect to database
    require('connect.php');

        //Check if the user exists in the database first
        $check = mysqli_query($conn, "SELECT id FROM memberships_table WHERE email = '$email'");
        //if a result was returned it means that a email of that user exists in the db
            if(mysqli_num_rows($check) > 0)
            {

            }
            else
            {
				// showing message that the email has entered was not found in the database.
                echo "<p>$email not exists in the database.</br >
                Go <a href='unsubscribe.php'>back</a> and try again</p>";
            }      
}
?>
<!-- unsubscribe page description-->
    <h2>Unsubcribe</h2>
    <h4>This unsubscribe option are only available for our current members</h4>
    <h5>Enter the email you used to subscribe to our newsletters</h5>
	<!--entered email will mail to administrator email address in order to unsubscribe by the administrator-->
    <form action="mailto:teama_rad@hotmail.com" method="post" enctype = "text/plain" class='centre'>
        <label for="text">Email:</label>
        <input type="email" name="email">
        <input type="submit" name="unsubscribe" id="unsubscribe "value="Unsubscribe" data-toggle='tooltip'title='Click to unsubscribe'/>
    </form>

   
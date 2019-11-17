<?php
include "index.php";

//define variables and set to empty values
$fnameErr = $emailErr = $optionsErr = "";
$fname = $email = $options = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    //if name textfield is blank 
    if(empty($_POST["fname"])){
        $fnameErr = "Name is required";
    }
    else{
        $fname = test_input($_POST["fname"]);

        //Check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
            $fnameErr = "Only letters and whitespace allowed";
        }
    }   
    //if email textfield is blank    
    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    }
    else{
        $email = test_input($_POST["email"]);

        //check if email address is well formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
    }
    
    //If none is selected.
    if(empty($_POST["options"])){
        $optionsErr = "Please select one of our communication option!";
    }
    else{
        $options = test_input($_POST["options"]);
        
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
if ($fnameErr == ""  && $emailErr == "" && $optionsErr == "")
{
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        
        //connect to database
        require('connect.php');
        
        //Check if the user exists in the database first
        $check = mysqli_query($conn, "SELECT id FROM memberships_table WHERE email = '$email'");
        
        //if a result was returned it means that a email of that user already exists in the db
	    if(mysqli_num_rows($check) > 0)
	    {
            echo "<h4>$fname already exists in the database.</h4>
                <br><br>
			    Go <a href='signup.php'>back</a> and try again</p>";
        }
        else
	    {
            //Insert into the database
            $qry = "INSERT INTO memberships_table
			    	(fname, email,options)
				    VALUES
                    ('$fname','$email','$options')"; 
        
            //execute the query
		    if(mysqli_query($conn, $qry))
		    {
			    //strip out an slashes that were added if there was an apostrophe in the name
                $Name = stripslashes($fname);
                echo "<h2>'$fname' inserted successfully!!</h2>
					    <p><a href='index.php'>Return to Homepage</a></p>";	
            }
            else
		    {
			    echo "ERROR: Could not execute $qry. " . mysqli_error($conn);
            }
        }
        mysqli_free_result($check);
        mysqli_close($conn);
    }
}
?>
    
    <h1>Membership Management</h1>
    
    <fieldset>
        <h2>Fill in all necessary information!</h2>
	<p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="fname">
		<span class="error">* <?php echo $fnameErr; ?></span>
        <br><br>
        <label for="text">Email :</label>
        <input type="text" name="email">
        <span class="error">*<?php echo $emailErr; ?></span>
        <br><br>
        <h3>Subscribe to our Newsletter?</h3>
		<h4> Choose an option that you prefer ! </h4>
        <input type = "checkbox" value="monthlynewsletter" name = "options">Monthly newsletter</input>
        <br>
        <input type = "checkbox" value="newsflashnotification" name = "options">Newsflash Notification</input>
        <span class = "error">*<?php echo $optionsErr; ?></span>
        <br><br>
        <input type="submit" name="submit" id="submit "value="Subscribe"/>
</form>
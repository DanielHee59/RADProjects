<?php
include "index.php";

//define variables and set to empty values
$nameErr = $emailErr = $optionsErr = "";
$name = $email = $options = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "Name is required";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/", ($_POST["name"])))
    {
        $nameErr = "Only letters and white space allowed";
    }
    elseif (empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
}
if ($nameErr == ""  && $emailErr == "" && $options == "")
{
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        //connect to database
        require('connect.php');
        
        //Check if the user exists in the database first
        $check = mysqli_query($conn, "SELECT id FROM memberships_table WHERE email = '$email'");
        
        //if a result was returned it means that a email of that user already exists in the db
	    if(mysqli_num_rows($check) > 0)
	    {
            echo "<h4>$name already exists in the database.</h4>
                <br><br>
			    Go <a href='signup.php'>back</a> and try again</p>";
        }
        else
	    {
            //Insert into the database
            $qry = "INSERT INTO memberships_table
			    	(name, email)
				    VALUES
                    ('$name','$email')"; 
        
            //execute the query
		    if(mysqli_query($conn, $qry))
		    {
			    //strip out an slashes that were added if there was an apostrophe in the name
                $Name = stripslashes($name);
                echo "<h2>'$name' inserted successfully!!</h2>
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

<h1> Memberships </h1>
    <h2>Sign Up</h2>
    <fieldset>
	<p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name">
		<span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        <label for="text">Email :</label>
        <input type="email" name="email">
        <span class="error">*</span>
        <br><br>
        <h3>Subscribe to our newsletter?</h3>
        <h4>Which option you would prefer?</h4>
        <input type = "checkbox" value="yes" name = "monthly">Monthly newsletter</input>
        <br>
        <input type = "checkbox" value="yes" name = "breaking">Breaking newsflash notification</input>
        <br><br>
        <input type="submit" name="submit" id="submit "value="Submit"/>
</form>
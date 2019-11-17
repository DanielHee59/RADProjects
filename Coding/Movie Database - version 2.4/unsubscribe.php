<?php
include "index.php";
if (isset($_POST['unsubscribe'])) 
{
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
                echo "<p>$email not exists in the database.</br >
                Go <a href='unsubscribe.php'>back</a> and try again</p>";
            }      
}
?>
    <h2>Unsubcribe</h2>
    <h4>This unsubscribe option only for current members</h4>
    <h5>Enter the email you used to sign up into our membership</h5>
    <form action="mailto:p466426@tafe.wa.edu.au" method="post" enctype = "text/plain" class='centre'>
        <label for="text">Email      :</label>
        <input type="email" name="email">
        <input type="submit" name="unsubscribe" id="unsubscribe "value="Unsubscribe"/>
    </form>

    <!-- $to = "tzeyee1019@gmail.com";
                $subject = "Simple Email Test via PHP";
                $message = "Hi, this is test email send by PHP Script";
                $headers = "From:server";
                $headers = "testing";
                
                $retval = mail($to, $subject, $to, $message, $headers);

                if ($retval == true)
                {
                    echo("Email successfully sent to admin for request to remove subscription...");
                } 
                else 
                {
                    echo("Email sending failed...");
                } -->
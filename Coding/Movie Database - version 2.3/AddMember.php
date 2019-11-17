


<?php

include"index.php";

//define variables and set to empty values
$nameErr = $emailErr = $optionsErr ="";
$name = $email = $options = "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["name"]))
        {
            $nameErr = "Name is required";
        }
        else
        {
            $name = test_input($_POST["name"]);
            //Check if name only contains letters and whitespace
            if(!preg_match("/^[a-zA-Z ]*$/",$name))
            {
                $nameErr = "Only letters and whitespace allowed";
            }
        }       
        if(empty($_POST["email"]))
        {
            $emailErr = "Email is required";
        }
        else{
            $email = test_input($_POST["email"]);
            //check if email address is well formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
              }
        }
		
		if(empty($_POST["options"])){
            $optionsErr = "Please select one of our communication option!";
        }
        else{
            $options = test_input($_POST["options"]);
            
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
	
	if($nameErr == ""  && $emailErr == "" && $options == ""){
        
        //creating a connection
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $dbname = "movies";

        $name = $_POST['name'];
        $email = $_POST['email'];
		$options = $_POST['options'];

        try{
            $connection = new PDO ("mysql:host=$server_name;dbname=$dbname",$user_name,$password);
            $connection-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

            $statement = $connection->prepare("INSERT INTO memberships_table (name, email, options) 
            VALUES (:name,:email,:options)");
	        $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':options', $options);
            $statement->execute();

            echo "<h2>'$name' inserted successfully!!</h2>
					  <p><a href='index.php'>Return to Homepage</a></p>";
        }
        catch(PDOException $ex){
            echo "Connection Failed" .$ex->getMessage();
        }
    }
    else if(empty($_POST["name"])){
        $nameErr = "Name is required";
        echo $nameErr;
    }

    else if(empty($_POST["email"])){
        $emailErr = "Email is required";
        echo $emailErr;
    }
	else if(empty($_POST["options"])){
            $optionsErr = "Please select one of our communication option!";
			echo $optionsErr;
                    
	}
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format"; 
        echo $emailErr;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $nameErr = "Only letters and whitespace allowed";
        echo $nameErr;
    }

    $connection = null;




?>

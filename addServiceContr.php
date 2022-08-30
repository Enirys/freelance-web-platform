<?php 


    // get current user info
    include('CurrentUserInfo.php');
    
    if(isset($_POST['submit']))
	{    
		// connect to database
		include('dbConfig.php');

		// declare variables
		$name;
		$description;
        $price = 0;

        // get selected competences and put them in an array
		$selectedComp = $_POST['competence'];
		
		$name = htmlspecialchars(addslashes($_POST['name']));
		$description = htmlspecialchars(addslashes($_POST['description']));

        // check if user entered a valid price
		if(is_numeric(htmlspecialchars($_POST['price'])))
		{
			$price = doubleval(htmlspecialchars($_POST['price']));
		}else
		{
			echo "Please enter a valid price";
		}
		
		// create query (insert into service table)
		$sql = "INSERT INTO service(name,description,price) VALUES('$name','$description','$price')";

		// execute query
		mysqli_query($con,$sql);

		// get last inserted service id
		$last_id = mysqli_insert_id($con);

		$userid = $_SESSION['userID'];

		// create query (insert into postedservice table)
        $sql = "INSERT INTO postedservice VALUES('$userid','$last_id')";

        // execute query 
		mysqli_query($con,$sql);

        // loop through selected competences 
		foreach ($selectedComp as $selected) {
			// create query (insert into required competence for service)
			$competenceID = $selected;
			$sql = "INSERT INTO requiredcomptence VALUES('$last_id','$competenceID')";
			//execute query
			mysqli_query($con,$sql);
        }
		// close database
		mysqli_close($con);
		
        header('Location: Page.php?query=myServices');
    }else
    {
        header('Location: addServiceView.php');
    }
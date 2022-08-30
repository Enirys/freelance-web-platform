<?php 

    // get current user info
    include('CurrentUserInfo.php');
    
    if(isset($_POST['add']))
	{    
		// connect to database
		include('dbConfig.php');

		// declare variables
		$description;

		$description = htmlspecialchars(addslashes($_POST['description']));

		// create query (insert into service table)
		$sql = "INSERT INTO competence(description) VALUES('$description')";

		// execute query
		mysqli_query($con,$sql);

		// close database
		mysqli_close($con);
		
        header('Location: admin.php?query=competences');
    }else
    {
        header('Location: admin.php');
    }
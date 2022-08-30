<?php

    // declare variables for user info
    $username;
    $email;
    $password;
    $type;

    // get user data from form

    if(isset($_POST['register']))
    {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $type = htmlspecialchars($_POST['type']);

        // connect to database
        include('dbconfig.php');

        // create query
        if($type == "Employer")
        {
            $sql = "INSERT INTO users(username,email,password,isEmployer,isAdmin,isFreelancer) VALUES('$username','$email','$password',1,0,0)";
        }else if($type == "Freelancer")
        {
            $sql = "INSERT INTO users(username,email,password,isEmployer,isAdmin,isFreelancer) VALUES('$username','$email','$password',0,0,1)";
        }

        // execute query
        if(mysqli_query($con,$sql))
        {
            $last_id = mysqli_insert_id($con);
            if($type == "Employer")
            {
                $sql = "INSERT INTO employer(empID) VALUES ('$last_id')";
                
            }else if($type == "Freelancer")
            {
                $sql = "INSERT INTO freelancer(freelancerID) VALUES ('$last_id')";
            }
            $res = mysqli_query($con,$sql);
            header('Location: loginView.php');
           
        }else
        {
            echo "Error!";
        }

        // close connection
        mysqli_close($con);
    }

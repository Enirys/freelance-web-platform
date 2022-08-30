<?php

    // declare variables for user info
    $username;
    $email;
    $password;

    // get user data from form

    if(isset($_POST['add']))
    {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // connect to database
        include('dbconfig.php');

        // create query
        $sql = "INSERT INTO users(username,email,password,isEmployer,isAdmin,isFreelancer) VALUES('$username','$email','$password',0,1,0)";
        
        // execute query
        if(mysqli_query($con,$sql))
        {
            $last_id = mysqli_insert_id($con);
            $sql = "INSERT INTO administrateur(adminID) VALUES ('$last_id')";
                
            $res = mysqli_query($con,$sql);
        }else
        {
            echo "Error!";
        }

        // close connection
        mysqli_close($con);
        header('Location: admin.php?query=admins');
    }
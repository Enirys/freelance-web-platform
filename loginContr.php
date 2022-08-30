<?php 

    // user info variables from form
    $email;
    $password;

    // get user input 
    if(isset($_POST['login']))
    {
        // init variables
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // connect to database
        include('dbconfig.php');

        // create query
        $sql = "SELECT username,email,password,photo,isEmployer,isFreelancer,isAdmin FROM users WHERE email='$email' AND password='$password'";

        // execute query
        $result = mysqli_query($con,$sql);

        // fetch query result
        $users = mysqli_fetch_array($result);

        if(!empty($users))
        {
            // user exists

            // create session for the user
            session_start();
            $_SESSION['username'] = $users['username'];
            $_SESSION['photo'] = $users['photo'];

            // redirect user
            header('Location: Home.php');

        }else
        {
            // error message
            echo "Wrong E-mail/Password";
        }
        // close connection
        mysqli_close($con);
    }

    

    

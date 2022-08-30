<?php 

    // connect to database
    include('dbConfig.php');

    session_start();
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        
        // get current user info
        $sql = "SELECT userID,isEmployer,isAdmin,isFreelancer FROM users WHERE username='$username'";

        // execute query
        $result = mysqli_query($con,$sql);

        // fetch result into array
        $currentUser = mysqli_fetch_array($result);

        $_SESSION['userID'] = $currentUser['userID'];
        
        if($currentUser['isEmployer'] == 1)
        {
            $_SESSION['type'] = "Employer";

        }else if($currentUser['isAdmin'] == 1)
        {
            $_SESSION['type'] = "Admin";
        }else if($currentUser['isFreelancer'] == 1)
        {
            $_SESSION['type'] = "Freelancer";
        }
        
    }else
    {
        header('Location: loginView.php');
    }

    // close database connection
    mysqli_close($con);

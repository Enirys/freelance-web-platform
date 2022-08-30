<?php 

    // get current user info
    include('CurrentUserInfo.php');

    $compid;
    $type = $_SESSION['type'];

    if(isset($_GET['userID']))
    {
        // connect to database
        include('dbConfig.php');

        $userid = $_GET['userID'];
        if($type == "Admin")
        {
            $sql = "DELETE FROM users WHERE userID ='$userid'";
            mysqli_query($con,$sql);
            header('Location: admin.php?query=users');
        }else{
            header('Location: ErrorPage.php');
        }

        // close connection
        mysqli_close($con);
    }


<?php 

    // get current user info
    include('CurrentUserInfo.php');

    $compid;
    $type = $_SESSION['type'];

    if(isset($_GET['compID']))
    {
        // connect to database
        include('dbConfig.php');

        $compid = $_GET['compID'];
        if($type == "Admin")
        {
            $sql = "DELETE FROM competence WHERE compID ='$compid'";
            mysqli_query($con,$sql);
            header('Location: admin.php?query=competences');
        }else{
            header('Location: ErrorPage.php');
        }

        // close connection
        mysqli_close($con);
    }


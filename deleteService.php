<?php 

    // get current user info
    include('CurrentUserInfo.php');

    $serviceid;
    $userid = $_SESSION['userID'];
    $type = $_SESSION['type'];

    if(isset($_GET['serviceID']))
    {
        // connect to database
        include('dbConfig.php');

        $serviceid = $_GET['serviceID'];
        if($type == "Admin")
        {
            $sql = "DELETE FROM service WHERE serviceID ='$serviceid'";
            mysqli_query($con,$sql);
            header('Location: admin.php?query=services');

        }else{

            // check if serviceID is posted by current user
            $sql = "SELECT * FROM postedservice WHERE empID ='$userid' AND serviceID='$serviceid'";

            $result = mysqli_query($con,$sql);

            // execute query
            if($result)
            {
                $row = mysqli_num_rows($result);
                if($row > 0)
                {
                    // this service is posted by current user so delete service
                    $sql = "DELETE FROM service WHERE serviceID ='$serviceid'";
                    mysqli_query($con,$sql);

                    // redirect user to services page
                    header('Location: Page.php?query=myServices');

                } else
                {
                    // Display error message
                    header('Location: ErrorPage.php');
                }
            }
        }

        // close connection
        mysqli_close($con);

    }

    
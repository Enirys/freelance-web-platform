<?php 

    // get current user info
    include('CurrentUserInfo.php');

    $serviceid;
    $userid = $_SESSION['userID'];
    $freelancerid = $_GET['freelancerID'];
    $type = $_SESSION['type'];

    if(isset($_GET['serviceID']))
    {
        // connect to database
        include('dbConfig.php');

        $serviceid = $_GET['serviceID'];
        if($type == "Admin")
        {
            $sql = "DELETE FROM requete WHERE freelancerID ='$freelancerid' AND serviceID='$serviceid'";
            mysqli_query($con,$sql);
            header('Location: admin.php?query=requests');

        }else{
            // check if request is posted by current user
            $sql = "SELECT * FROM requete WHERE freelancerID ='$userid' AND serviceID='$serviceid'";

            $result = mysqli_query($con,$sql);

            // execute query
            if($result)
            {
                $row = mysqli_num_rows($result);
                if($row > 0)
                {
                    // this request is posted by current user so delete request
                    $sql = "DELETE FROM requete WHERE freelancerID ='$userid' AND serviceID='$serviceid'";
                    mysqli_query($con,$sql);

                    // redirect user to request page
                    header('Location: Page.php?query=myRequests');
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

    
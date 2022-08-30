<?php

    // get current user info
    include('CurrentUserInfo.php');

    $serviceid;
    $userid = $_SESSION['userID'];

    if(isset($_GET['serviceID']))
    {
        // connect to database
        include('dbConfig.php');

        $serviceid = $_GET['serviceID'];

        // check if serviceID is posted by current user

        $sql = "SELECT * FROM requete WHERE serviceID='$serviceid' AND freelancerID ='$userid'";
        $result = mysqli_query($con,$sql);

        // execute query
        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                // this request is posted by current user so edit request
                
                if(isset($_POST['edit']))
                {
                    $sMessage = htmlspecialchars(addslashes($_POST['message']));

                    $sql = "UPDATE requete SET requestMsg = '$sMessage' WHERE serviceID = '$serviceid' AND freelancerID ='$userid'";
                    mysqli_query($con,$sql);

                    // redirect user to requests page
                    header('Location: Page.php?query=myRequests');
                }
            } else
            {
                // Display error message
                echo "You can't edit this request!";
            }
        }

        // close connection
        mysqli_close($con);
    }

    
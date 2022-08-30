<?php 

    // get current user info
    include('CurrentUserInfo.php');

    $serviceid;
    $freelancerID;
    $userid = $_SESSION['userID'];

    if(isset($_GET['serviceID']) && isset($_GET['userID']))
    {
        $serviceid = $_GET['serviceID'];
        $freelancerID = $_GET['userID'];

        // connect to database
        include('dbConfig.php');

        // check if service request is posted by current user
        $sql = "SELECT R.serviceID FROM requete R, postedservice ps WHERE R.serviceID = ps.serviceID AND R.serviceID = '$serviceid' AND ps.empID = '$userid'";
        
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);

        if($rows > 0)
        {
            if(isset($_GET['query']))
            {
                $query = $_GET['query'];

                // check query (deny or accept)
                if($query == "accept")
                {
                    // change request state
                    $sql = "UPDATE requete SET state = 'Accepted' WHERE serviceID = '$serviceid' AND freelancerID = '$freelancerID'";
                    
                }else if($query == "deny")
                {
                    // change request state
                    $sql = "UPDATE requete SET state = 'Denied' WHERE serviceID = '$serviceid' AND freelancerID = '$freelancerID'";
                    
                }
                mysqli_query($con,$sql);
                header("Location: Page.php?query=requests&serviceID=$serviceid");
            }
        }else{
            echo "You're not allowed to do this!";
        }
        // close connection
        mysqli_close($con);
    }

    

    
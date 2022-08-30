<?php

    // get current user info
    include('CurrentUserInfo.php');

    $compid;
    $userid = $_SESSION['userID'];

    if(isset($_GET['compID']))
    {
        // connect to database
        include('dbConfig.php');

        $compid = $_GET['compID'];

        // check if current user is admin

        $sql = "SELECT * FROM competence WHERE compID='$compid'";
        $result = mysqli_query($con,$sql);

        $compDescription = $competence['description'];
        $sDescription;

        // execute query
        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                
                if(isset($_POST['edit']))
                {
                    if(isset($_POST['description']))
                    {
                        $sMessage = htmlspecialchars(addslashes($_POST['description']));
                    }else {
                        $sMessage = $currentMessage;
                    }

                    $sql = "UPDATE competence SET description = '$sMessage' WHERE compID = '$compid'";
                    mysqli_query($con,$sql);

                    // redirect user to requests page
                    header('Location: admin.php?query=competences');
                }
            } else
            {
                // Display error message
                echo "You can't edit this competence!";
            }
        }

        // close connection
        mysqli_close($con);
    }

    
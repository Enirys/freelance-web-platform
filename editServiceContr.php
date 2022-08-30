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

        // get current service infos

        $sql = "SELECT * FROM service WHERE serviceID='$serviceid'";
        $result = mysqli_query($con,$sql);

        $services = mysqli_fetch_array($result);

        $currentName = $services['name'];
        $currentDescription = $services['description'];
        $currentPrice = $services['price'];
        $currentStatus = $services['status'];

        // check if serviceID is posted by current user

        $sql = "SELECT * FROM postedservice WHERE empID ='$userid' AND serviceID='$serviceid'";
        $result = mysqli_query($con,$sql);

        // execute query
        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                // this service is posted by current user so edit service
                if(isset($_POST['edit']))
                {
                    if(isset($_POST['name']))
                    {
                        $sname = htmlspecialchars(addslashes($_POST['name']));
                    }else {
                        $sname = $currentName;
                    }
                    if(isset($_POST['description']))
                    {
                        $sdescription = htmlspecialchars(addslashes($_POST['description']));
                    }else {
                        $sdescription = $currentDescription;
                    }
                    if(isset($_POST['price']))
                    {
                        if(is_numeric(htmlspecialchars($_POST['price'])))
                        {
                            $sprice = doubleval(htmlspecialchars($_POST['price']));
                        }else
                        {
                            echo "Please enter a valid price";
                        }
                    }else {
                        $sprice = $currentPrice;
                    }
                    // REVIEW THIS PART
                    if(isset($_POST['status']))
                    {
                        $sstatus = $_POST['status'];
                    }else {
                        $sstatus = $currentStatus;
                    }

                    $sql = "UPDATE SERVICE SET name = '$sname', description = '$sdescription', price = '$sprice', status = '$sstatus' WHERE serviceID = '$serviceid'";
                    mysqli_query($con,$sql);
                    // redirect user to services page
                    header('Location: Page.php?query=myServices');
                }
            } else
            {
                // Display error message
                echo "You can't edit this service!";
            }
        }

        // close connection
        mysqli_close($con);
    }

    
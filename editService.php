<!-- import materialise files -->
<?php include('materialiseConfig.php');?>

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

        $sql = "SELECT * FROM postedservice WHERE empID ='$userid' AND serviceID='$serviceid'";
        $result = mysqli_query($con,$sql);

        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                // this service is posted by current user so edit service
                // get current service infos

                $sql = "SELECT * FROM service WHERE serviceID='$serviceid'";
                $result = mysqli_query($con,$sql);

                $services = mysqli_fetch_array($result);

                $currentName = $services['name'];
                $currentDescription = $services['description'];
                $currentPrice = $services['price'];
                $currentStatus = $services['status'];
            }else
            {
                header('Location: ErrorPage.php');
            }
        }
        
        // close connection
        mysqli_close($con);

    }
?>

<title>Edit service</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- edit form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Edit service.</h4>
                    <form action="editServiceContr.php?serviceID=<?php echo $serviceid; ?>" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="name" type="text" name="name" value="<?php echo $currentName; ?>" class="validate">
                            <label for="name" class="blue-grey-text text-darken-4 brand-regular">Service title</label>
                        </div>
                        <div class="input-field">
                            <input id="description" type="text" name="description" value="<?php echo $currentDescription; ?>" class="validate">
                            <label for="description" class="blue-grey-text text-darken-4 brand-regular">Description</label>
                        </div>
                        <div class="input-field">
                            <input id="price" type="text" name="price" value="<?php echo $currentPrice; ?>" class="validate">
                            <label for="price" class="blue-grey-text text-darken-4 brand-regular">Price</label>
                        </div>
                        <label>
                            <input name="status" type="radio" value="Open"/>
                            <span class="brand-regular blue-grey-text text-darken-4">Open</span>
                        </label>
                        <label>
                            <input name="status" type="radio" value="Closed"/>
                            <span class="brand-regular blue-grey-text text-darken-4">Closed</span>
                        </label>
                        <div class="container center section white"><button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="edit">Save Changes</button>
                        </div>

                    </form>
                </div>
                
            </div>
            <div class="col s6">
                <!-- insert image -->
            </div>
        </div>
    </section>
<!-- include footer -->
<?php include('footer.php');?>
</html>
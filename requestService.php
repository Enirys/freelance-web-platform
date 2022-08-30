<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<?php 
    // connect to database
    include('dbConfig.php');

    $serviceid;
    $userid = $_SESSION['userID'];

    if(isset($_GET['serviceID']))
    {
        $serviceid = $_GET['serviceID'];
    }

    // check if serviceID is posted by current user

    $sql = "SELECT * FROM postedservice WHERE empID ='$userid' AND serviceID='$serviceid'";

    $result = mysqli_query($con,$sql);

    // execute query
    if($result)
    {
        $row = mysqli_num_rows($result);
        if($row > 0)
        {
            // this service is posted by current user so get all requests
            // get all requests for the current service
            $sql = "SELECT R.requestMsg,R.freelancerID,U.username, S.name FROM requete R,service S, users U WHERE R.serviceID='$serviceid' AND S.serviceID = R.serviceID AND U.userID = R.freelancerID";
            $result = mysqli_query($con,$sql);

            // fetch data into an array
            $requests = mysqli_fetch_all($result,MYSQLI_ASSOC);

        } else
        {
            // Display error message
            header('Location: ErrorPage.php');
        }
    }

    // close database
    mysqli_close($con);
?>

<title>Requests</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- Show service requests -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Requests</h5>
    <div class="row">
        <?php foreach ($requests as $request) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $request['name']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $request['username']; ?></p>
                    <p class="blue-grey-text text-darken-4"><?php echo $request['requestMsg']; ?></p>
                </div>
                <div class="card-action">
                    <a href="UserProfile.php?userID=<?php echo $request['freelancerID']; ?>">Freelancer Profile</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


<!-- include footer -->
<?php include('footer.php');?>
</html>

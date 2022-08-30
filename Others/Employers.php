<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<?php 
    // connect to database
    include('dbConfig.php');

    // get all employers
    $sql = "SELECT U.userID,U.username,E.bio FROM users U,employer E WHERE U.userID = E.empID";
    $result = mysqli_query($con,$sql);

    // fetch data into an array
    $employers = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // close database
    mysqli_close($con);
?>

<title>Employers</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- Show employers -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Search for employers</h5>
    <div class="row">
        <?php foreach ($employers as $employer) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $employer['username']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $employer['bio']; ?></p>
                </div>
                <div class="card-action">
                    <a href="employerDetails.php?userID=<?php echo $employer['userID']; ?>">More info</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


<!-- include footer -->
<?php include('footer.php');?>
</html>

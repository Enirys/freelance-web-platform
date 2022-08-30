<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<?php 
    // connect to database
    include('dbConfig.php');

    // get all freelancers
    $sql = "SELECT U.userID,U.username,F.bio,F.rating,F.nbRecommendation FROM users U,freelancer F
        WHERE U.userID = F.freelancerID";
    $result = mysqli_query($con,$sql);

    // fetch data into an array
    $freelancers = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // close database
    mysqli_close($con);
?>

<title>Freelancers</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- Show freelancers -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Search for freelancers</h5>
    <div class="row">
        <?php foreach ($freelancers as $freelancer) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $freelancer['username']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $freelancer['bio']; ?></p>
                    <p class="blue-grey-text text-darken-4"><?php echo $freelancer['rating']; ?></p>
                    <p class="blue-grey-text text-darken-4"><?php echo $freelancer['nbRecommendation']; ?></p>
                </div>
                <div class="card-action">
                    <a href="UserProfile.php?userID=<?php echo $freelancer['userID']; ?>">More info</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


<!-- include footer -->
<?php include('footer.php');?>
</html>

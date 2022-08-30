<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<!-- get user info according to id -->
<?php 
    $user;
    $type;
    $myType;
    $useridGET;
    $useridSess;

    session_start();
    if(isset($_GET['userID']))
    {
        $useridSess = $_SESSION['userID'];
        if(isset($_SESSION['type']))
        {
            $myType = $_SESSION['type'];
        }
        // connect to database
        include('dbConfig.php');

        $useridGET = $_GET['userID'];

        // select user info from database
        $sql = "SELECT isEmployer,isFreelancer,isAdmin FROM users WHERE userID = $useridGET";

        $result = mysqli_query($con,$sql);
        $user = mysqli_fetch_assoc($result);

        if($user['isEmployer'])
        {
            $type = "Employer";
        }else if($user['isFreelancer'])
        {
            $type = "Freelancer";
        }else if($user['isAdmin'])
        {
            $type = "Admin";
        }

        if($type == "Employer")
        {
            $sql = "SELECT U.userID,U.username, U.email, U.phoneNumber,E.bio FROM users U, employer E WHERE U.userID = $useridGET AND E.empID = U.userID";
        }else if($type == "Freelancer")
        {
            $sql = "SELECT U.userID,U.username,U.email, U.phoneNumber, F.bio,F.rating,F.nbRecommendation FROM users U,freelancer F
            WHERE U.userID = $useridGET AND U.userID = F.freelancerID";
        }else if($type == "Admin")
        {
            $sql = "SELECT username, email, phoneNumber FROM users WHERE userID = $useridGET";
        }

        $result = mysqli_query($con,$sql);
        $user = mysqli_fetch_assoc($result);

        // close connection
        mysqli_close($con);
    }
?>

<title><?php echo $user['username']; ?></title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- User info -->
<div class="container">
    <div class="row">
        <div class="col s6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title brand-regular blue-text text-darken-2"><?php echo $user['username']; ?></span>
                        <p class="blue-grey-text text-darken-4"><?php echo $user['email']; ?></p>
                        <p class="blue-grey-text text-darken-4"><?php echo $user['phoneNumber']; ?></p>
                        
                        <?php if($type <> "Admin")
                        { ?>
                            <p class="blue-grey-text text-darken-4"><?php echo $user['bio']; ?></p>
                            <?php if($type == "Freelancer" && $myType == "Employer")
                            { ?>
                                <p class="blue-grey-text text-darken-4"><?php echo "Rating: ".$user['rating']; ?></p>
                                <p class="blue-grey-text text-darken-4"><?php echo "Recommendations: ".$user['nbRecommendation']; ?></p>
                                <a href="Recommend.php?userID=<?php echo $user['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="Recommend"><i class="material-icons">done</i></a>
                            <?php } ?>
                        <?php } ?>
                        
                        <?php if($useridGET == $useridSess){ ?>
                                    <a href="editProfile.php?userID=<?php echo $useridGET; ?>" class="tooltipped" data-position="top" data-tooltip="Edit profile"><i class="material-icons">edit</i></a>

                        <?php } ?>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- include footer -->
<?php include('footer.php');?>
</html>
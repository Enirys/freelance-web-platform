<?php 
    // get current user info
    include('CurrentUserInfo.php');

    
    if(isset($_GET['userID']))
    {
        $userid = $_GET['userID'];
        $userType = $_SESSION['type'];

        // connect to database
        include('dbConfig.php');

        // get user info
        if($userType == "Employer")
        {
            $sql = "SELECT U.userID,U.username,U.email,U.phoneNumber,U.photo,E.bio
            FROM users U, employer E
            WHERE U.userID = E.empID AND U.userID = $userid";

            $result = mysqli_query($con,$sql);
            $currentUser = mysqli_fetch_array($result);

        }else if($userType == "Freelancer")
        {
            $sql = "SELECT U.userID,U.username,U.email,U.phoneNumber,U.photo,F.bio,F.rating,F.nbRecommendation
            FROM users U, freelancer F
            WHERE U.userID = F.freelancerID AND U.userID = $userid";

            $result = mysqli_query($con,$sql);
            $currentUser = mysqli_fetch_array($result);

        }else if($userType == "Admin")
        {
            $sql = "SELECT U.userID,U.username,U.email,U.phoneNumber,U.photo
            FROM users U
            WHERE U.userID = $userid";

            $result = mysqli_query($con,$sql);
            $currentUser = mysqli_fetch_array($result);
        }   
    }
?>

    <!-- import materialise files -->
    <?php include('materialiseConfig.php');?>
    
    <title>Edit Profile</title>
    </head>
    
    <!-- include navbar -->
    <?php include('navbar.php');?>

    <!-- edit form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Edit profile.</h4>
                    <form action="editProfileContr.php?userID=<?php echo $currentUser['userID']; ?>&type=<?php echo $userType; ?>" method="POST" class="loginForm" enctype="multipart/form-data">
                        <div class="input-field">
                            <input id="username" type="text" name="username" value="<?php echo $currentUser['username']; ?>" class="validate">
                            <label for="username" class="blue-grey-text text-darken-4 brand-regular">Username</label>
                        </div>
                        <div class="input-field">
                            <input id="email" type="email" name="email" value="<?php echo $currentUser['email']; ?>" class="validate">
                            <label for="email" class="blue-grey-text text-darken-4 brand-regular">E-mail</label>
                        </div>
                        <div class="input-field">
                            <input id="phoneNumber" type="text" name="phoneNumber" value="<?php echo $currentUser['phoneNumber']; ?>" class="validate">
                            <label for="phoneNumber" class="blue-grey-text text-darken-4 brand-regular">Phone Number</label>
                        </div>
                        <div class="input-field">
                            <textarea id="bio" type="text" name="bio" value="<?php echo $currentUser['bio']; ?>" class="validate materialize-textarea"></textarea>
                            <label for="bio" class="blue-grey-text text-darken-4 brand-regular">Bio</label>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn blue darken-2 brand-bold waves-effect waves-light">
                                <span>Upload</span>
                                <input type="file" name="photo">
                            </div>
                            <div class="file-path-wrapper" value="<?php echo $currentUser['photo']; ?>">
                                <input class="file-path validate" type="text">
                            </div>
                            </div>
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

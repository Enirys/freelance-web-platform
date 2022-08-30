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

        // check if request is posted by current user

        $sql = "SELECT * FROM requete WHERE freelancerID ='$userid' AND serviceID='$serviceid'";
        $result = mysqli_query($con,$sql);

        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                // this request is posted by current user 
                // get current request infos

                $sql = "SELECT * FROM requete WHERE freelancerID ='$userid' AND serviceID='$serviceid'";
                $result = mysqli_query($con,$sql);

                $request = mysqli_fetch_array($result);

                $currentMessage = $request['requestMsg'];
            }else
            {
                header('Location: ErrorPage.php');
            }
        }else {
            echo "Something!";
        }
        
        // close connection
        mysqli_close($con);

    }
?>

<title>Edit request</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- edit form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Edit request.</h4>
                    <form action="editRequestContr.php?serviceID=<?php echo $serviceid; ?>" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="name" type="text" name="message" value="<?php echo $currentMessage; ?>" class="validate" required>
                            <label for="name" class="blue-grey-text text-darken-4 brand-regular">Your message</label>
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
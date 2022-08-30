<!-- import materialise files -->
<?php include('materialiseConfig.php');?>

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

        // check if request is posted by current user

        $sql = "SELECT * FROM competence WHERE compID='$compid'";
        $result = mysqli_query($con,$sql);

        if($result)
        {
            $row = mysqli_num_rows($result);
            if($row > 0)
            {
                // this request is posted by current user 
                // get current request infos

                $sql = "SELECT * FROM competence WHERE compID='$compid'";
                $result = mysqli_query($con,$sql);

                $competence = mysqli_fetch_array($result);

                $compDescription = $competence['description'];
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

<title>Edit competence</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- edit form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Edit competence.</h4>
                    <form action="editCompetenceContr.php?compID=<?php echo $compid; ?>" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="description" type="text" name="description" value="<?php echo $compDescription; ?>" class="validate" required>
                            <label for="description" class="blue-grey-text text-darken-4 brand-regular">Competence name</label>
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
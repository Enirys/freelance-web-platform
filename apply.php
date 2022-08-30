<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<title>Apply</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<?php

    $serviceID;

    if(isset($_GET['serviceID']))
    {
        $serviceID = $_GET['serviceID'];

        // connect to database
        include('dbconfig.php');

        $userid = $_SESSION['userID'];

        // check if user already applied to this service
        $sql = "SELECT * FROM requete WHERE serviceID = '$serviceID' AND freelancerID = '$userid'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);

        if($rows > 0)
        {
            $errorMsg = "You already applied to this service!";
            header("Location: Page.php?query=services&errorMessage=$errorMsg");
        } else{

            if(isset($_POST['submit']))
            {
                $message = addslashes($_POST['message']);

                $sql = "INSERT INTO requete(freelancerID,serviceID,requestMsg) VALUES('$userid','$serviceID','$message')";
            
                // execute query
                $result = mysqli_query($con,$sql);

                // close connection
                mysqli_close($con);
            }
            
        }
    }
?>
<!-- Apply form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Apply for service.</h4>
                    <form action="apply.php?serviceID=<?php echo $serviceID ?>" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="name" type="text" name="message" class="validate" required>
                            <label for="name" class="blue-grey-text text-darken-4 brand-regular">Your message</label>
                        </div>
                        <div class="container center">
                            <button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="submit">APPLY</button>
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
<?php include('footer.php')?>
</html>
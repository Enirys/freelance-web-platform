<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<title>Admin</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<?php
    // get current user id
    $userid = $_SESSION['userID'];
    $type = $_SESSION['type'];
    $query;

    if(isset($_GET['query']))
    {
        $query = $_GET['query'];

        if($query == "addAdmin")
        {
            // check if current user is admin
            if($type == "Admin")
            { 
                // show add admin form
            ?>
                <!-- add admin form -->
                <section class="container">
                    <div class="row">
                        <div class="col s6">
                            <div class="white sectiondiv">
                                <h4 class="brand-bold blue-grey-text text-darken-4 center">Add admin.</h4>
                                <form action="addAdminContr.php" method="POST" class="loginForm">
                                    <div class="input-field">
                                        <input id="username" type="text" name="username" class="validate">
                                        <label for="username" class="blue-grey-text text-darken-4 brand-regular">Username</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="e-mail" type="email" name="email" class="validate">
                                        <label for="e-mail" class="blue-grey-text text-darken-4 brand-regular">E-mail address</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="password" type="password" name="password" class="validate">
                                        <label for="password" class="blue-grey-text text-darken-4 brand-regular">Password</label>
                                    </div>
                                    <div class="container center section white"><button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="add">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col s6">
                            <!-- insert image -->
                        </div>
                    </div>
                </section>
            <?php
            }else{
                header("Location: ErrorPage.php");
            }
        }else if($query == "addCompetence")
        {
            // check if current user is admin
            if($type == "Admin")
            { // show add competence form
            ?>
                <!-- Add competence form -->
                <section class="container">
                    <div class="row">
                        <div class="col s6">
                            <div class="white sectiondiv">
                                <h4 class="brand-bold blue-grey-text text-darken-4 center">Add competence.</h4>
                                <form action="addCompetenceContr.php" method="POST" class="loginForm">
                                    <div class="input-field">
                                        <input id="name" type="text" name="description" class="validate" required>
                                        <label for="name" class="blue-grey-text text-darken-4 brand-regular">Competence name</label>
                                    </div>
                                    <div class="container center">
                                        <button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="add">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col s6">
                            <!-- insert image -->
                        </div>
                    </div>
                </section>
            <?php }else{
                header("Location: ErrorPage.php");
            }
        }
    }

?>

<!-- include footer -->
<?php include('footer.php');?>
</html>
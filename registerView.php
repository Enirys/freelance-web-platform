<!-- import materialise files -->
<?php include('materialiseConfig.php');?>

<title>Sign up</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- sign up form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Sign up.</h4>
                    <form action="registerContr.php" method="POST" class="loginForm">
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
                        <label>
                            <input name="type" type="radio" value="Freelancer" checked />
                            <span class="brand-regular blue-grey-text text-darken-4">Freelancer</span>
                        </label>
                        <label>
                            <input name="type" type="radio" value="Employer"/>
                            <span class="brand-regular blue-grey-text text-darken-4">Employer</span>
                        </label>
                        <div class="container center section white"><button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="register">SIGN UP</button>
                            <p><a href="loginView.php" class="brand-regular blue-grey-text text-darken-4">Already have an account? Sign in</a></p>
                        </div>

                    </form>
                </div>
                
            </div>
            <div class="col s6">
                <!-- insert image -->
                <img src="CoffeeBreak.svg" class="responsive-img">
            </div>
        </div>
    </section>
<!-- include footer -->
<?php include('footer.php');?>
</html>
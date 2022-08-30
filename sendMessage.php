<!-- import materialise files -->
<?php include('materialiseConfig.php');?>

<title>New message</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- new message form -->
<section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Send message.</h4>
                    <form action="sendMessage.php" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="e-mail" type="email" name="email" class="validate" required>
                            <label for="e-mail" class="blue-grey-text text-darken-4 brand-regular">E-mail address</label>
                        </div>
                        <div class="input-field">
                            <input id="password" type="password" name="password" class="validate" required>
                            <label for="password" class="blue-grey-text text-darken-4 brand-regular">Password</label>
                        </div>
                        <a href="#" class="blue-text text-darken-2 brand-regular">Forgot password?</a>
                        <p>
                            <label>
                                <input type="checkbox" class="filled-in" name="remember">
                                <span class="brand-regular blue-grey-text text-darken-4">Remember me</span>
                            </label>
                        </p>
                        <div class="container center"><button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="login">SIGN IN</button>
                            <p><a href="registerView.php" class="brand-regular blue-grey-text text-darken-4">Not a member yet? Sign up for free</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s6 valign-wrapper section">
                <!-- insert image -->
                <img src="CoffeeBreak.svg" class="responsive-img">
            </div>
        </div>
    </section>
<!-- include footer -->
<?php include('footer.php');?>
</html>
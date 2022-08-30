<body class="grey lighten-4">
    <nav class="nav-wrapper white">
        <div class="container">
            <?php
                if(isset($_SESSION['username']))
                { ?>   
                    <ul class="right center">
                        <?php if(isset($_SESSION['photo']))
                        { ?>
                            <img src="avatars/<?php echo $_SESSION['photo']; ?>" style="height: 56px;" class="circle dropdown-trigger" data-target='dropdown1'>
                        <?php }else{ ?>
                            <img src="avatars/default.svg" style="height: 56px;" class="circle dropdown-trigger" data-target='dropdown1'>
                        <?php } ?>
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="UserProfile.php?userID=<?php echo $_SESSION['userID']; ?>" class="brand-bold blue-grey-text text-darken-4"><i class="material-icons">person</i><?php echo $_SESSION['username']; ?></a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="Home.php" class="brand-regular blue-grey-text text-darken-4"><i class="material-icons">home</i>Dashboard</a></li>
                            <li><a href="#!" class="brand-regular blue-grey-text text-darken-4"><i class="material-icons">settings</i>My account</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="messages.php" class="brand-regular blue-grey-text text-darken-4"><i class="material-icons">mail_outline</i>Messages</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="logout.php" class="brand-regular blue-grey-text text-darken-4"><i class="material-icons">power_settings_new</i>Logout</a></li>
                        </ul>
                    </ul>
                    <?php if($_SESSION['type'] == "Employer")
                    { ?>
                        <a href="Home.php" class="brand-bold brand-logo blue-text text-darken-2">Morning Coffee</a>
                        
                        <ul class="right">
                            <li><a href="addServiceView.php" class="brand-regular blue-grey-text text-darken-4">Post Service</a></li>
                            <li><a href="Page.php?query=freelancers" class="brand-regular blue-grey-text text-darken-4">Freelancers</a></li>
                            <li><a href="Page.php?query=myServices" class="brand-regular blue-grey-text text-darken-4">Services</a></li>
                        </ul> 
                    <?php }else if($_SESSION['type'] == "Freelancer")
                    { ?>
                        <a href="Home.php" class="brand-bold brand-logo blue-text text-darken-2">Morning Coffee</a>
                        
                        <ul class="right">
                            <li><a href="Page.php?query=employers" class="brand-regular blue-grey-text text-darken-4">Employers</a></li>
                            <li><a href="Page.php?query=services" class="brand-regular blue-grey-text text-darken-4">Browse Services</a></li>
                            <li><a href="Page.php?query=myRequests" class="brand-regular blue-grey-text text-darken-4">My Requests</a></li>
                        </ul>
                    <?php } else if($_SESSION['type'] == "Admin")
                    { ?>
                        <a href="Home.php" class="brand-bold brand-logo blue-text text-darken-2">Morning Coffee</a>
                        
                        <ul class="right">
                                <li><a href="#" class="dropdown-trigger brand-regular blue-grey-text text-darken-4" data-target='dropdown2'>Users</a></li>
                                <ul id='dropdown2' class='dropdown-content'>
                                    <li><a href="admin.php?query=employers" class="brand-regular blue-grey-text text-darken-4">Employers</a></li>
                                    <li><a href="admin.php?query=freelancers" class="brand-regular blue-grey-text text-darken-4">Freelancers</a></li>
                                    <li><a href="admin.php?query=admins" class="brand-regular blue-grey-text text-darken-4">Admins</a></li>
                                </ul>
                            <li><a href="admin.php?query=services" class="brand-regular blue-grey-text text-darken-4">Services</a></li>
                            <li><a href="admin.php?query=requests" class="brand-regular blue-grey-text text-darken-4">Requests</a></li>
                            <li><a href="admin.php?query=competences" class="brand-regular blue-grey-text text-darken-4">Competences</a></li>
                        </ul>
                    <?php }
                }else
                { ?>
                    <a href="index.php" class="brand-bold brand-logo blue-text text-darken-2">Morning Coffee</a>
                    <ul class="right">
                        <li><a href="registerView.php" class="btn blue darken-2 brand-bold">SIGN UP</a></li>
                        <li><a href="loginView.php" class="btn blue darken-2 brand-bold">SIGN IN</a></li>
                    </ul>
                <?php } ?>
        </div>
    </nav>
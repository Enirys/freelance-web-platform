<?php

    if(isset($_POST['edit']))
    {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $bio = htmlspecialchars($_POST['bio']);
        $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        $type = htmlspecialchars($_GET['type']);
        $userid = htmlspecialchars($_GET['userID']);
        $currentPhoto = htmlspecialchars($_FILES['photo']['name']);

        // get photo
        $photo = $userid."_".$_FILES['photo']['name'];
        $target = 'avatars/' . $photo;

        move_uploaded_file($_FILES['photo']['tmp_name'],$target);

        // connect to database
        include('dbConfig.php');

        $sql = "UPDATE users SET username = '$username', email = '$email', phoneNumber = '$phoneNumber', photo = '$photo' WHERE userID = '$userid'";
        mysqli_query($con,$sql);

        if($type == "Employer")
        {
            $sql = "UPDATE employer SET bio = '$bio' WHERE empID = '$userid'";
        }else if($type == "Freelancer")
        {
            $sql = "UPDATE freelancer SET bio = '$bio' WHERE freelancerID = '$userid'";
        }

        if(mysqli_query($con,$sql))
        {
            header("Location: Home.php");
        }else{
            header('Location: ErrorPage.php');
        }
        
    }
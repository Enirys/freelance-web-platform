<?php
    session_start();

    if(isset($_SESSION['username']))
    {
        session_destroy();
        header('Location: loginView.php');
    } else
    {
        header('Location: loginView.php');
    }

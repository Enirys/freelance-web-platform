<?php
    
    $con = mysqli_connect('localhost','root','','morning_coffee');

    if(!$con)
    {
        echo "Unable to connect to the database!";
    }
?>
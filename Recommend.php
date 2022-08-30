<?php 

    if(isset($_GET['userID']))
    {

        $userID = $_GET['userID'];

        // connect to database
        include('dbConfig.php');

        // check if already recommended user
        
        // get nb recommendations of user
        $sql = "SELECT F.nbRecommendation FROM freelancer F, users U 
        WHERE U.userID = $userID AND U.userID = F.freelancerID";

        $result = mysqli_query($con,$sql);
        $recommendation = mysqli_fetch_array($result);
        echo $recommendation;

        // increment recommendations of user

        // update nb recommendations in freelancer table

        // redirect to Page.php?query=freelancers
    }

?>

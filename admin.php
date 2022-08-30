<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<?php
    $query;
    if(isset($_GET['query']))
    {
        // connect to database
        include('dbConfig.php');

        $query = $_GET['query'];

        if($query == "services")
        {
            // get all services
            $sql = "SELECT S.serviceID,S.name,S.description,S.price,S.status,ps.empID 
            FROM service S, postedservice ps WHERE S.serviceID = ps.serviceID"; ?>
            <title>Services</title>

        <?php }else if($query == "freelancers")
        {
            // get all freelancers
            $sql = "SELECT U.userID,U.username,F.bio,F.rating,F.nbRecommendation FROM users U,freelancer F
            WHERE U.userID = F.freelancerID"; ?>
            <title>Freelancers</title>

        <?php }else if($query == "employers")
        {
            // get all employers
            $sql = "SELECT U.userID,U.username,E.bio FROM users U,employer E WHERE U.userID = E.empID"; ?>
            <title>Employers</title>
        <?php }else if($query == "requests")
        {
            // get all requests
            $sql = "SELECT U.username,R.freelancerID,R.serviceID,R.requestMsg,R.state,S.name,S.description,S.price,S.status,ps.empID 
                    FROM requete R,service S,postedservice ps, users U
                    WHERE S.serviceID = R.serviceID AND S.serviceID = ps.serviceID AND U.userID = R.freelancerID"; ?>
            <title>Requests</title>
        <?php }else if($query == "competences")
        {
            // get all competences
            $sql = "SELECT * FROM competence";
        } else if($query == "admins")
        {
            // get all admins
            $sql = "SELECT U.username,U.email,U.phoneNumber,A.adminID
                    FROM users U, administrateur A
                    WHERE U.userID = A.adminID"; ?>
                    <title>Admins</title>
        <?php }
        $results = mysqli_query($con,$sql);

        // fetch data into an array
        $fetchedResults = mysqli_fetch_all($results,MYSQLI_ASSOC);

        // close database
        mysqli_close($con);
    }

?>

</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<?php if($query == "services")
{ ?>
<!-- Show my services -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Services</h5>
    <div class="row">
        <?php foreach ($fetchedResults as $fetchedResult) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['name']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $fetchedResult['description']; ?></p>
                    <p class="blue-grey-text text-darken-4"><?php echo $fetchedResult['price']; ?> $</p>
                    <p class="blue-grey-text text-darken-4"><?php echo $fetchedResult['status']; ?></p>
                </div>
                <div class="card-action">
                    <a href="deleteService.php?serviceID=<?php echo $fetchedResult['serviceID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete service"><i class="material-icons">delete</i></a>
                    <a href="UserProfile.php?userID=<?php echo $fetchedResult['empID']; ?>" class="tooltipped" data-position="top" data-tooltip="Employer Profile"><i class="material-icons">person</i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }else if($query == "freelancers"){ ?>
    <!-- Show freelancers -->
    <div class="container">
        <h5 class="brand-bold blue-grey-text text-darken-4 center">Freelancers</h5>
        <div class="row">
            <?php foreach ($fetchedResults as $fetchedResult) { ?>
                <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['username']; ?></span>
                        <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Bio:</span> <?php echo $fetchedResult['bio']; ?></p>
                        <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Rating:</span> <?php echo $fetchedResult['rating']; ?></p>
                        <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Recommendations:</span> <?php echo $fetchedResult['nbRecommendation']; ?></p>
                    </div>
                    <div class="card-action">
                        <a href="UserProfile.php?userID=<?php echo $fetchedResult['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="Freelancer profile"><i class="material-icons">person</i></a>
                        <a href="deleteUser.php?userID=<?php echo $fetchedResult['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete user"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
<?php }else if($query == "requests"){ ?>
<!-- Show service requests -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Requests</h5>
    <div class="row">
        <?php foreach ($fetchedResults as $fetchedResult) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['name']; ?></span>
                    <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Freelancer:</span> <?php echo $fetchedResult['username']; ?></p>
                    <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Message:</span> <?php echo $fetchedResult['requestMsg']; ?></p>
                    <p class="blue-grey-text text-darken-4"><span class="brand-bold blue-grey-text text-darken-4">Request status:</span> <?php echo $fetchedResult['state']; ?></p>
                </div>
                <div class="card-action">
                    <a href="deleteRequest.php?freelancerID=<?php echo $fetchedResult['freelancerID']; ?>&serviceID=<?php echo $fetchedResult['serviceID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete request"><i class="material-icons">delete</i></a>
                    <a href="UserProfile.php?userID=<?php echo $fetchedResult['empID']; ?>" class="tooltipped" data-position="top" data-tooltip="Employer profile"><i class="material-icons">person</i></a>
                    <a href="UserProfile.php?userID=<?php echo $fetchedResult['freelancerID']; ?>" class="tooltipped" data-position="top" data-tooltip="Freelancer profile"><i class="material-icons">person</i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }else if($query == "employers"){ ?>
<!-- Show employers -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Employers</h5>
    <div class="row">
        <?php foreach ($fetchedResults as $fetchedResult) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['username']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $fetchedResult['bio']; ?></p>
                </div>
                <div class="card-action">
                    <a href="UserProfile.php?userID=<?php echo $fetchedResult['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="Employer profile"><i class="material-icons">person</i></a>
                    <a href="deleteUser.php?userID=<?php echo $fetchedResult['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete user"><i class="material-icons">delete</i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }else if($query == "competences"){ ?>
<!-- Show competences -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Competences</h5>
    <a href="add.php?query=addCompetence" class="btn brand-bold blue darken-2">Add competence</a>
    <div class="row">
        <?php foreach ($fetchedResults as $fetchedResult) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['description']; ?></span>
                </div>
                <div class="card-action">
                    <a href="editCompetence.php?compID=<?php echo $fetchedResult['compID']; ?>" class="tooltipped" data-position="top" data-tooltip="Edit competence"><i class="material-icons">edit</i></a>
                    <a href="deleteCompetence.php?compID=<?php echo $fetchedResult['compID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete competence"><i class="material-icons">delete</i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }else if($query == "admins"){ ?>
<!-- Show competences -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">Admins</h5>
    <a href="add.php?query=addAdmin" class="btn brand-bold blue darken-2">Add admin</a>
    <div class="row">
        <?php foreach ($fetchedResults as $fetchedResult) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $fetchedResult['username']; ?></span>
                </div>
                <div class="card-action">
                    <a href="deleteUser.php?userID=<?php echo $fetchedResult['adminID']; ?>" class="tooltipped" data-position="top" data-tooltip="Delete user"><i class="material-icons">delete</i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>    
<?php } ?>

<!-- include footer -->
<?php include('footer.php');?>
</html>
<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<?php
    // connect to database
    include('dbConfig.php');

    $userid = $_SESSION['userID'];
     
    // get user's posted services
    $sql = "SELECT S.serviceID,S.name,S.description,S.price,S.status FROM service S,postedservice ps
            WHERE ps.empID = '$userid' AND S.serviceID = ps.serviceID";
    $result = mysqli_query($con,$sql);

    // fetch data into an array
    $services = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // close database
    mysqli_close($con);
?>

<title>Services</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- Show services -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">My services</h5>
    <div class="row">
        <?php foreach ($services as $service) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $service['name']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $service['description']; ?></p>
                    <p class="blue-grey-text text-darken-4"><?php echo $service['price']; ?> $</p>
                    <p class="blue-grey-text text-darken-4"><?php echo $service['status']; ?></p>
                </div>
                <div class="card-action">
                    <a href="deleteService.php?serviceID=<?php echo $service['serviceID']; ?>"><i class="material-icons">delete</i></a>
                    <a href="editService.php?serviceID=<?php echo $service['serviceID']; ?>"><i class="material-icons">edit</i></a>
                    <a href="requestService.php?serviceID=<?php echo $service['serviceID']; ?>">Requests</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>


<!-- include footer -->
<?php include('footer.php');?>
</html>

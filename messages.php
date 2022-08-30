<?php include('CurrentUserInfo.php');?>

<?php 
    $userid = $_SESSION['userID'];

    // connect to database
    include('dbConfig.php');

    // get messages
    $sql = "SELECT M.senderID,U.userID,U.username,M.content FROM users U, message M 
    WHERE M.receiverID = '$userid' AND U.userID = M.senderID";

    // execute query
    $result = mysqli_query($con,$sql);

    // fetch results
    $messages = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // close connection
    mysqli_close($con);

?>

    <!-- import materialise files -->
    <?php include('materialiseConfig.php');?>
    
    <title>Messages</title>
    </head>
    
    <!-- include navbar -->
    <?php 
        include('navbar.php');
    ?>

    <!-- Show my messages -->
<div class="container">
    <h5 class="brand-bold blue-grey-text text-darken-4 center">My messages</h5>
    <a href="sendMessage.php" class="btn brand-bold blue darken-2">New message</a>
    <div class="row">
        <?php foreach ($messages as $message) { ?>
            <div class="col s4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title brand-regular blue-text text-darken-2"><?php echo $message['username']; ?></span>
                    <p class="blue-grey-text text-darken-4"><?php echo $message['content']; ?></p>
                </div>
                <div class="card-action">
                    <a href="deleteMessage.php?senderID=<?php echo $message['senderID']; ?>&receiverID=<?php echo $userid; ?>" class="tooltipped" data-position="top" data-tooltip="Delete message"><i class="material-icons">delete</i></a>
                    <a href="UserProfile.php?userID=<?php echo $message['userID']; ?>" class="tooltipped" data-position="top" data-tooltip="User profile"><i class="material-icons">person</i></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
    
    <!-- include footer -->
    <?php include('footer.php');?>
</html>

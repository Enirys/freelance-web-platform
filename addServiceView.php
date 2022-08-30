<!-- import materialise files -->
<?php include('materialiseConfig.php');?>
<?php include('CurrentUserInfo.php');?>

<title>Add a service</title>
</head>

<!-- include navbar -->
<?php include('navbar.php');?>

<!-- get all competences from database
<?php
	// connect to database
	include('dbconfig.php');

	// get all competences
    $sql = "SELECT compID,description FROM competence";
	$result = mysqli_query($con,$sql);

	// fetch all comptences data into an array
    $competences = mysqli_fetch_all($result,MYSQLI_ASSOC);

    // close connection
    mysqli_close($con);
?>
<!-- Add service form -->
    <section class="container">
        <div class="row">
            <div class="col s6">
                <div class="white sectiondiv">
                    <h4 class="brand-bold blue-grey-text text-darken-4 center">Post your service.</h4>
                    <form action="addServiceContr.php" method="POST" class="loginForm">
                        <div class="input-field">
                            <input id="name" type="text" name="name" class="validate" required>
                            <label for="name" class="blue-grey-text text-darken-4 brand-regular">Service title</label>
                        </div>
                        <div class="input-field">
                            <input id="description" type="text" name="description" class="validate" required>
                            <label for="description" class="blue-grey-text text-darken-4 brand-regular">Description</label>
                        </div>
                        <div class="input-field">
                            <input id="price" type="text" name="price" class="validate" required>
                            <label for="price" class="blue-grey-text text-darken-4 brand-regular">Price</label>
                        </div>
                        <div class="input-field">
                            <select multiple name="competence[]">
                                <option value="" disabled selected>Choose your options</option>
                                <?php foreach ($competences as $competence) {?>
			                    <option value="<?php echo $competence['compID']?>"><?php echo $competence['description']?></option>
		                        <?php }?>
                            </select>
                            <label class="blue-grey-text text-darken-4 brand-regular">Required competences for this service.</label>
                        </div>
                        <div class="container center">
                            <button class="btn blue darken-2 brand-bold waves-effect waves-light" type="submit" name="submit">POST</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s6">
                <!-- insert image -->
            </div>
        </div>
    </section>
<!-- include footer -->
<?php include('footer.php')?>
</html>
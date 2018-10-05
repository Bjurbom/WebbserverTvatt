<?php
	include("includes/config.php");

    $id = $_SESSION['userLoggedIn'];
	$adress = "hejvägen 23";

	$myquery = mysqli_query($con,"SELECT * FROM users WHERE adress='$adress'");
    $query = $con->query("SELECT bild FROM users WHERE lagenhetsnummer = '$id'");
	 
	

	if(!isset($_SESSION['userLoggedIn'])){
		header("Location: index.php");
	}

	if(isset($_POST['logout'])){
		echo "hello";
	}

	

		
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Schema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/user.css"> 

</head>
<body>
<div class="header">

<h1>Schema upplägg</h1>

<div id="profileInfo">
	<h2>Profile</h2> <br>

	<img src="<?php $query ?>">



	<p>namn: <?php $_SESSION['userLoggedIn']?></p>

	<input value="Logout" type="button" onclick="<?php
 session_destroy();
 
 
 ?>" action="user.php" method="POST" name="logout" >

</div>


</div>

<?php 	include("includes/handlers/schema-handler.php"); ?>









	
</body>
</html>
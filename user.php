<?php
	include("includes/config.php");

    $id = $_SESSION['userLoggedIn'];

	

	if(!isset($_SESSION['userLoggedIn'])){
		header("Location: index.php");
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

	<input value="Logout" type="button" method="POST" name="logout" >

</div>


</div>
<div id="leftGroup">
</div>

<div id="middleGroup">
	<form action="includes/handlers/makeDate.php" method="POST">

	<h2>Booka</h2>

	<p>
		<label for="datum">Datum</label>
		<input type="date" name="datum" id="firstname">
	</p>

	<p>
		<label for="tid">Tid</label>
		<input type="time" name="tid" id="firstname">
	</p>


	<input type="submit">

</form>
</div>

<div id="rightGroup">
</div>

<?php 	include("includes/handlers/schema-handler.php"); ?>









	
</body>
</html>
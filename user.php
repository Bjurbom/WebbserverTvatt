<?php
	include("includes/config.php");
	include("includes/functions/usersFunktions.php");
	$id = $_SESSION['userLoggedIn'];
	
	//array[0] måste vara null eftersom sen när jag använder arrayen så börjar det på 1 och uppåt och inte 0 och uppåt.
	$veckdag = array('null', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag', 'Söndag');
	
	//om man trycker på "Nästa Vecka" knappen så sparar man värdet $datum i $_POST['datum'].
	//if(isset... gör så att om du har tryckt på "läggTillVecka" knappen så gör det här. Annars går koden förbi det.
    if(isset($_POST['läggTillVecka'])){
		$datum = $_POST['datum'];
		$datum = TilläggDatum($datum);
		//tar in ett datum och översätter det till bara år
		$year = date('Y', strtotime($datum));
		$week = datumTillVecka($datum);
	}
	
		
	//om man trycker på "Nästa Vecka" knappen så sparar man värdet $datum i $_POST['datum'].
	//if(isset... gör så att om du har tryckt på "läggTillVecka" knappen så gör det här. Annars går koden förbi det.
	if(isset($_POST['reduceraVecka'])){
		$datum = $_POST['datum'];
		$datum = ReduceraDatum($datum);
		//tar in ett datum och översätter det till bara år
		$year = date('Y', strtotime($datum));
		$week = datumTillVecka($datum);
	}
	
	
    $userid = $id;	
	//date är en php function som beräknar datum. i det här fallet tar den in dagens datum i år/månad/dag. ex 1776/04/09
	$nuvarandeDatum = date("Y/m/d");
	
	//Första gången sidan körs så är ingen variabel "set"ad så då är "!isset" true. Detta är då standard värdena.
	if(!isset($datum)){
		$datum = $nuvarandeDatum;
	}
	
	if(!isset($week)){
	$week = datumTillVecka($nuvarandeDatum);
	}
	
	if(!isset($year)){
	$year = date("Y");
	}
    
	if(!isset($_SESSION['userLoggedIn'])){
		header("Location: index.php");
	}

	$_SESSION['agare'] = $_SESSION['userLoggedIn'];
	
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
<?php 
//tar ut namnet och bilden från databasen från användaren 
    $sql = "SELECT * FROM users WHERE lagenhetsnummer='$id'";
    if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
			 
	echo "<img src=". $row['bild'] .">";
	
	echo "<p>namn:". $row['namn'] ."</p>";
	
	
		 }
    mysqli_free_result($result);
    } else{
        echo "No Picture Is Found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
    <form action="includes/handlers/log-out.php" method="POST">
    <input type="submit" value="Logga ut">

</form>

</div>


</div>
<div id="leftGroup">
</div>

<div id="middleGroup">
	<form action="includes/handlers/makeDate.php" method="POST">

	<h2>Boka</h2>

	<p>
		<label for="datum">Datum</label>
		<input type="date" name="datum" id="firstname" required>
	</p>

	<p>
		<label for="tid">Tid</label>
		<input type="time" name="tid" id="firstname" required>
	</p>


	<input type="submit">

</form>

<form action="includes/handlers/deletedDate.php" method="POST">
	<input type="submit" value="avboka">
</form>

</div>
<br>

<div id="rightGroup">
<form action="user.php" method="post">

<input name="reduceraVecka" type="submit" value="Föregånde Vecka">

<input name="datum" type="hidden" value='<?php echo "$datum"?>'>
</form>

<div id="veckblock">
<h3 id="veckatext">Vecka: 
<?php

echo $week;

?>
</div>
</h3>

<form action="user.php" method="post">

<input name="läggTillVecka" type="submit" value="Nästa Vecka">

<input name="datum" type="hidden" value='<?php echo "$datum"?>'>

</form>

</div>

 <div class="row" id="schema">	 
<?php
//går igenom alla veckodagar. därav 7 för att det är 7 dagar i en vecka.
for($i = 1; $i <= 7; $i++)  {
	
	echo loadSchema($i, $userid, $week, $year, $con, $veckdag[$i]);
}

?>
 
  
	</div>
  </div>
</div>  	
</body>
</html>
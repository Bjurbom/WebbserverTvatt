<?php
	include("includes/config.php");
	include("includes/functions/usersFunktions.php");
	$id = $_SESSION['userLoggedIn'];
	
	
	//om man trycker på "Nästa Vecka" knappen så sparar man värdet $week i $_POST['$week'].
	//if(isset... gör så att om du har tryckt på "läggTillVecka" knappen så gör det här.
    if(isset($_POST['läggTillVecka'])){
		$week = $_POST['week'];
		$year = $_POST['year'];
		$week += 1;
		if($week > 52){
			$year +=1;
			$week = 1;
		}
	}
		
	//om man trycker på "Nästa Vecka" knappen så sparar man värdet $week i $_POST['$week'].
	//if(isset... gör så att om du har tryckt på "läggTillVecka" knappen så gör det här.
	if(isset($_POST['reduceraVecka'])){
		$week = $_POST['week'];
		$year = $_POST['year'];
		$week -= 1;
		if($week < 1){
			$year -= 1;
			$week = 52;
		}
	}
	
	$bookningsidlista = array();	
	$datum = date("Y/m/d");
	if(!isset($week)){
	$week = datumTillVecka($datum);
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

<input name="week" type="hidden" value='<?php echo "$week"?>'>
<input name="year" type="hidden" value='<?php echo "$year"?>'>
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

<input name="week" type="hidden" value='<?php echo "$week"?>'>
<input name="year" type="hidden" value='<?php echo "$year"?>'>
</form>

</div>
<?php echo accurateDatumCheck(1,1,2019); ?>
 <div class="row" id="schema2">	
 
  <div class="column">
  
    <div class="card">
	
	<p>Måndag <?php echo datumCheck($week,"1", $year); ?></p>
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Tisdag <?php echo datumCheck($week,"2", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"2", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"2", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Onsdag <?php echo datumCheck($week,"3", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"3", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"3", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Torsdag <?php echo datumCheck($week,"4", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"4", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"4", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Fredag <?php echo datumCheck($week,"5", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"5", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"5", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Lördag <?php echo datumCheck($week,"6", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"6", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"6", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Söndag <?php echo datumCheck($week,"7", $year); ?></p>
	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"7", $year),$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"7", $year),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	</div>
  </div>
</div>  
<?php
/*

    $sql = "SELECT * FROM schemat";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        $date = $row['dagforbokning'];
        $dayOfTheWeek = date('l' , strtotime($date));
        



        echo "<table>";
            echo "<tr>";
                echo "<th>Ägare</th>";
                echo "<th>TidFörbokning</th>";
                echo "<th>dag</th>";
              //  echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['agare'] . "</td>";
                echo "<td>" . $row['tidForBokning'] . "</td>";
                echo "<td>" . $dayOfTheWeek. " ".  $row['dagforbokning'].  "</td>";
           //     echo "<td>" . $row['bild'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Emty LOL XD .";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
*/
?>









	
</body>
</html>
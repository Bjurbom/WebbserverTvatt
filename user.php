<?php
	include("includes/config.php");
	$id = $_SESSION['userLoggedIn'];
	

    
	$bookningsidlista = array();	
	$datum = date("Y/m/d");
	$selectedDate = $datum;
	
	
	if(!isset($_SESSION['userLoggedIn'])){
		header("Location: index.php");
	}

	$_SESSION['agare'] = $_SESSION['userLoggedIn'];
	
	function datumCheck($week,$dagnummer){ //tar in vilken vecka det är och översätter det till måndag tisdagg... beroende på $dagnummer i veckan
	return date( " M d", strtotime("2018"."W".$week."$dagnummer") ); // First day of week

	}
	
	function accurateDatumCheck($week,$dagnummer){ //tar in vilken vecka det är och översätter det till måndag tisdagg... beroende på $dagnummer i veckan
	//ska vara med år för att kunna checka det med databasen.
	return date( "Y/m/d", strtotime("2018"."W".$week."$dagnummer") ); // First day of week
	}
	
	function TilläggDatum($tempdatum, $tillägg) {
	//en funktion för att lägga till datum.	
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("$tillägg day", $date);
	$sumdate = date('Y/m/d', $date);
		return $sumdate;
	}
	
	function ReduceraDatum($tempdatum, $tillägg) {
	//en funktion för att minska datum.		
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("$tillägg day", $date);
	$sumdate = date('Y/m/d', $date);
		return $sumdate;
	}
	
	function checkabokning($tempdatum,$idlista,$temptime,$con) {
		
	    $tempbokad = 0;
		$sql = "SELECT * FROM schemat";
    if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
				
			if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum) {
			 $tempbokad = 1;
			 }
			
		 }
    mysqli_free_result($result);
    } else{
        echo "No";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }	
	  
	  if($tempbokad == 1) {
				 
			    echo "Bokad";
			 }
			 else{
			    echo "Ej Bookad";
		     }	
	  
	}
	
	 
	
	function checkabokningcolor($tempdatum,$idlista,$temptime,$con) {
		
		$tempbokad = 0;
		$sql = "SELECT * FROM schemat";
    if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
			 
			 if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum) {
			 $tempbokad = 1;
			 }
			 
		 }
    mysqli_free_result($result);
    } else{
        echo "No";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

		if($tempbokad == 1){
			echo "#e92121";
		}
		else{
			echo "#b7e500";
		}	
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
	<script src="assets/js/byttVecka.js"></script>

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
<button type="button" id="fVecka" onclick="<?php $selectedDate = TilläggDatum(datum, 7);?>">Föregående Vecka</button>
<div id="veckblock">
<h3 id="veckatext">Vecka: 
<?php
//översätter datum till vecka.
$ddate = $datum;
$date = new DateTime($ddate);
$week = $date->format("W");
echo "$week ";

?>
</div>
</h3>
<button type="button" id="nVecka" onclick="<?php $selectedDate = ReduceraDatum(datum, 7); ?>">Nästa Vecka</button> 
 
</div>
 <div class="row" id="schema">
 
  <div class="column">
  
    <div class="card">
	
	<p>Måndag <?php echo datumCheck($week,"1"); ?></p>
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor($selectedDate,$bookningsidlista,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"1"),$bookningsidlista,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor($selectedDate,$bookningsidlista,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"1"),$bookningsidlista,"22:00:00.000000",$con);
	?>
		</div>	
	
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Tisdag <?php echo datumCheck($week,"2"); ?></p>
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Onsdag <?php echo datumCheck($week,"3"); ?></p>
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Torsdag <?php echo datumCheck($week,"4"); ?></p>
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Fredag <?php echo datumCheck($week,"5"); ?></p>
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Lördag <?php echo datumCheck($week,"6"); ?></p>
	</div>
  </div>
  <div class="column">
    <div class="card">
	<p>Söndag <?php echo datumCheck($week,"7"); ?></p>
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
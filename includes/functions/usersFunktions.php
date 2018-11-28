<?php

	
	//översätter datum till vecka;
	function datumTillVecka($tempdatum){
		$ddate = $tempdatum;
		$date = new DateTime($ddate);
		$week = $date->format("W");
		return $week;
	}
	
	//tar in vilken vecka det är och översätter det till måndag tisdag... beroende på $dagnummer i veckan
	function datumCheck($week,$dagnummer,$year){ 
	// First day of week
	return date( " M d", strtotime("$year"."W".$week."$dagnummer") ); 

	}
	
	//tar in vilken vecka det är och översätter det till måndag tisdagg... beroende på $dagnummer i veckan ->
	//ska vara med år för att kunna checka det med databasen.
	function accurateDatumCheck($week,$dagnummer,$year){ 
	return date( "Y-m-d", strtotime("$year"."W".$week."$dagnummer") ); // First day of week
	}
	
	function TilläggDatum($tempdatum) {
	//en funktion för att lägga till datum.	
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("+7 day", $date);
	$sumdate = date('Y-m-d', $date);
		return $sumdate;
	}
	
	function ReduceraDatum($tempdatum) {
	//en funktion för att minska datum.		
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("-7 day", $date);
	$sumdate = date('Y-m-d', $date);
		return $sumdate;
	}
	
	function checkabokning($tempdatum,$id,$temptime,$con) {
		
	    $tempbokad = 0;
		$sql = "SELECT * FROM schemat";
    if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
				
			if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum) {
			 $tempbokad = 1;
			 }
			if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum && $row['agare'] == $id) {
			 $tempbokad = 2;
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
		else if($tempbokad == 2){
			echo "Bokad av dig";	 
		}
		else{
			echo "Ej Bookad";
		}	
	  
	}
	
	 
	
	function checkabokningcolor($tempdatum,$id,$temptime,$con) {
		
		$tempbokad = 0;
		$sql = "SELECT * FROM schemat";
    if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
			 
			 if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum) {
			 $tempbokad = 1;
			 }
			 if($row['tidForBokning'] == $temptime && $row['dagforbokning'] == $tempdatum && $row['agare'] == $id) {
			 $tempbokad = 2;
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
		else if($tempbokad == 2){
			echo "#FFFF00";
		}
		else{
			echo "#b7e500";
		}	
	}
		
    function loadSchema($veckodag, $id, $week, $year, $con,$dag ) {
		?>
		<div class="column">
  
    <div class="card">
	
	<p><?php echo $dag; echo datumCheck($week,"$veckodag", $year); ?></p>
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,$veckodag, $year),$id,"08:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">8:00 - 10:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,$veckodag, $year),$id,"08:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,$veckodag, $year),$id,"10:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">10:00 - 12:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,$veckodag, $year),$id,"10:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,$veckodag, $year),$id,"12:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">12:00 - 14:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"12:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"$veckodag", $year),$id,"14:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">14:00 - 16:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"14:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"$veckodag", $year),$id,"16:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">16:00 - 18:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"16:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"$veckodag", $year),$id,"18:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">18:00 - 20:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"18:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"$veckodag", $year),$id,"20:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">20:00 - 22:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"20:00:00.000000",$con);
	?>
		</div>	
	<div class="box" style="background-color:<?php //checkar om en bokning stämmer överens med just den här tiden 
	//och ger den röd om det är samma och grön om det inte är det
	checkabokningcolor(accurateDatumCheck($week,"$veckodag", $year),$id,"22:00:00.000000",$con)
	?>">
	<p style="padding: 2.5vh;">22:00 - 24:00</p>
	<?php
	checkabokning(accurateDatumCheck($week,"$veckodag", $year),$id,"22:00:00.000000",$con);
	?>
		</div>	
	
	</div>
  </div>
  
	<?php	
	}
		
	?>
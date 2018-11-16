<?php
	//översätter datum till vecka;
	function datumTillVecka($tempdatum){
		$ddate = $tempdatum;
		$date = new DateTime($ddate);
		$week = $date->format("W");
		return $week;
	}
	
	//tar in vilken vecka det är och översätter det till måndag tisdag... beroende på $dagnummer i veckan
	function datumCheck($week,$dagnummer){ 
	// First day of week
	return date( " M d", strtotime("2018"."W".$week."$dagnummer") ); 

	}
	
	//tar in vilken vecka det är och översätter det till måndag tisdagg... beroende på $dagnummer i veckan ->
	//ska vara med år för att kunna checka det med databasen.
	function accurateDatumCheck($week,$dagnummer){ 
	return date( "Y-m-d", strtotime("2018"."W".$week."$dagnummer") ); // First day of week
	}
	
	function TilläggDatum($tempdatum, $tillägg) {
	//en funktion för att lägga till datum.	
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("$tillägg day", $date);
	$sumdate = date('Y-m-d', $date);
		return $sumdate;
	}
	
	function ReduceraDatum($tempdatum, $tillägg) {
	//en funktion för att minska datum.		
    $start_date = $tempdatum;  
	$date = strtotime($start_date);
	$date = strtotime("$tillägg day", $date);
	$sumdate = date('Y-m-d', $date);
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
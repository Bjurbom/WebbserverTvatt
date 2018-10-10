<?php
	include("includes/config.php");

	$id = $_SESSION['userLoggedIn'];
	


	

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

	<img src="<?php $query ?>">



	<p>namn: <?php $id?></p>

    <form action="includes/handlers/log-out.php" method="POST">
    <input type="submit" value="Logga ut">

</form>

</div>


</div>
<div id="leftGroup">
</div>

<div id="middleGroup">
	<form action="includes/handlers/makeDate.php" method="POST">

	<h2>Booka</h2>

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

<div id="rightGroup">
</div>
<?php




    $sql = "SELECT * FROM schemat";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
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
                echo "<td>" . $row['dagforbokning'] . "</td>";
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

?>









	
</body>
</html>
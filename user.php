<?php
	include("includes/config.php");
	include("includes/handlers/schema-handler.php");
    $id = $_SESSION['userLoggedIn'];
	$adress = "hejvägen 23";

	$myquery = mysqli_query($con,"SELECT * FROM users WHERE adress='$adress'");
    $query = $con->query("SELECT bild FROM users WHERE lagenhetsnummer = '$id'");
	 
	$row = mysqli_fetch_array($myquery);
	$name = $row['adress'];
	

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
	<link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="assets/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="assets/css/user.css"> 

</head>
<body>
<div class="header">

<h1>Schema upplägg</h1>

<div id="profileInfo">
	<h2>Profile</h2> <br>

	<img src="<?php $query ?>">



	<p>namn: <?php $_SESSION['userLoggedIn']?></p>



</div>

<input value="Logout" type="button">

</div>




<div class="cd-schedule loading">
	<div class="timeline">
		<ul>
			<li><span>08:00</span></li>
			<li><span>08:30</span></li>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
			<li><span>17:30</span></li>
			<li><span>18:00</span></li>
		</ul>
	</div> <!-- .timeline -->

	<div class="events">
		<ul>
			<li class="events-group">
				<div class="top-info"><span>Monday</span></div>

				<ul>
					<li class="single-event" data-start="09:30" data-end="10:30" data-content="php-intags/strandereLogin" data-event="event-1">
						<a href="#0">
							<em class="event-name">Tor</em>
						</a>
					</li>

					<li class="single-event" data-start="11:00" data-end="12:30" data-content="event-rowing-workout" data-event="event-2">
						<a href="#0">
							<em class="event-name">Rowing Workout</em>
						</a>
					</li>

					<li class="single-event" data-start="14:00" data-end="15:15"  data-content="event-yoga-1" data-event="event-3">
						<a href="#0">
							<em class="event-name">Yoga Level 1</em>
						</a>
					</li>
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Tuesday</span></div>

				<ul>
					<li class="single-event" data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2">
						<a href="#0">
							<em class="event-name">Rowing Workout</em>
						</a>
					</li>

					<li class="single-event" data-start="11:30" data-end="13:00"  data-content="event-restorative-yoga" data-event="event-4">
						<a href="#0">
							<em class="event-name">Restorative Yoga</em>
						</a>
					</li>

					<li class="single-event" data-start="13:30" data-end="15:00" data-content="event-abs-circuit" data-event="event-1">
						<a href="#0">
							<em class="event-name">Abs Circuit</em>
						</a>
					</li>

					<li class="single-event" data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3">
						<a href="#0">
							<em class="event-name">Yoga Level 1</em>
						</a>
					</li>
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Wednesday</span></div>

				<!--<ul>
					<li class="single-event" data-start="09:00" data-end="10:15" data-content="event-restorative-yoga" data-event="event-4">
						<a href="#0">
							<em class="event-name">Restorative Yoga</em>
						</a>
					</li>

					<li class="single-event" data-start="10:45" data-end="11:45" data-content="event-yoga-1" data-event="event-3">
						<a href="#0">
							<em class="event-name">Yoga Level 1</em>
						</a>
					</li>

					<li class="single-event" data-start="12:00" data-end="13:45"  data-content="event-rowing-workout" data-event="event-2">
						<a href="#0">
							<em class="event-name">Rowing Workout</em>
						</a>
					</li>

					<li class="single-event" data-start="13:45" data-end="15:00" data-content="event-yoga-1" data-event="event-3">
						<a href="#0">
							<em class="event-name">Yoga Level 1</em>
						</a>
					</li>
				</ul>-->
			</li>

			<li class="events-group">
				<div class="top-info"><span>Thursday</span></div>

				<ul>
					<li class="single-event" data-start="09:30" data-end="10:30" data-content="event-abs-circuit" data-event="event-1">
						<a href="#0">
							<em class="event-name">Abs Circuit</em>
						</a>
					</li>

					<li class="single-event" data-start="12:00" data-end="13:45" data-content="event-restorative-yoga" data-event="event-4">
						<a href="#0">
							<em class="event-name">Restorative Yoga</em>
						</a>
					</li>

					<li class="single-event" data-start="15:30" data-end="16:30" data-content="event-abs-circuit" data-event="event-1">
						<a href="#0">
							<em class="event-name">Abs Circuit</em>
						</a>
					</li>

					<li class="single-event" data-start="17:00" data-end="18:30"  data-content="event-rowing-workout" data-event="event-2">
						<a href="#0">
							<em class="event-name">testing stuff</em>
						</a>
					</li>
				</ul>
			</li>

			<li class="events-group">
				<div class="top-info"><span>Friday</span></div>

				<ul>
					<li class="single-event" data-start="10:00" data-end="11:00"  data-content="event-rowing-workout" data-event="event-2">
						<a href="#0">
							<em class="event-name">Rowing Workout</em>
						</a>
					</li>

					<li class="single-event" data-start="12:30" data-end="14:00" data-content="event-abs-circuit" data-event="event-1">
						<a href="#0">
							<em class="event-name">Abs Circuit</em>
						</a>
					</li>

					<li class="single-event" data-start="15:45" data-end="16:45"  data-content="event-yoga-1" data-event="event-3">
						<a href="#0">
							<em class="event-name">Yoga Level 1</em>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="event-modal">
		<header class="header">
			<div class="content">
				<span class="event-date"></span>
				<h3 class="event-name"></h3>
			</div>

			<div class="header-bg"></div>
		</header>

		<div class="body">
			<div class="event-info"></div>
			<div class="body-bg"></div>
		</div>

		<a href="#0" class="close">Close</a>
	</div>

	<div class="cover-layer"></div>


</div> <!-- .cd-schedule -->
<script src="assets/js/modernizr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="assets/js/main.js"></script> <!-- Resource jQuery -->


	
</body>
</html>
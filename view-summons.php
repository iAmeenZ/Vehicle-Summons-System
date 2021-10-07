<?php include('php/session-admin.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success5']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template-admin.css">
	<link rel="stylesheet" type="text/css" href="css/style-view-summons.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="background">

	<div class="error-div">
		<?php include('php/success.php'); ?>
	</div>

	<div class="nav">
		<div class="nav-image">
			<img onclick="location.href='home-admin.php'" src="images/logo.png" width="200px">
			<div class="img-admin">STAFF</div>
		</div>
		<div class="nav-tab">
			<div class="nav-tab-logout">
				<button onclick="location.href='php/logout.php'"><strong>Logout</strong></button>
			</div>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='about-admin.php'"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='home-admin.php'"><strong>Home</strong></button>
		</div>
	</div>

	<div class="section1">
		<h1 class="section1-headerText"><?php echo $_SESSION['tempVehicle'] ?><button onclick="location.href='insert-admin.php'">Insert Summons</button></h1>
	</div>

	<div class="section2">
		
		  <?php 
		  
		  	$query = "SELECT * FROM summons WHERE vehicleno='{$_SESSION['tempVehicle']}' AND summonspaid='Not paid'";
		  	$results = mysqli_query($db, $query);
		  	$index = 1;

		  	echo "
				  <table class='table-myvehicle'>
				  <tr>
				  	<th>NO.</th>
				  	<th>SUMMONS NO.</th>
				  	<th>DEPARTMENT</th>
				    <th>ISSUED STATE</th>
				    <th>OFFENCE DATE/TIME</th>
				    <th>OFFENCE DETAILS</th>
				    <th>STAFF ID</th>
				    <th>STATUS</th>
				    <th></th>
				  </tr>
			  	";

		  	if (mysqli_num_rows($results) == 0) {
		  		echo "<h3 style='font-family:Trebuchet MS; color:rgba(0,0,0,0.8); text-align:center;'><i>This vehicle have no unpaid summons.</i><h3><br><br>";
		  	}


		  	while($row = $results->fetch_assoc()) {
		  		echo "
				  <tr style='height:3em;'>
				  	<td>" . $index . ".</td>
				    <td>" . $row['summonsno'] . "</td>
				    <td>" . $row['summonsdepart'] . "</td>
				    <td>" . $row['summonsstate'] . "</td>
				    <td>" . $row['summonsdate'] . " " . $row['summonstime'] . "</td>
				    <td>" . $row['summonsdetails'] . "</td>
				    <td>" . $row['staffid'] . "</td>
				    <td style='color:rgba(255,0,0,0.7); font-style: italic; font-weight:bold; '>" . $row['summonspaid'] . "</td>
				    ";

				    if ($row['staffid'] == $_SESSION['staffid']) {
				    echo "
				    	<td style='text-align:center'><form method='POST' action='view-summons.php'><input type='hidden' name='tempSummons' value='" . $row["summonsno"] . "' /><input type='submit' value='Delete' name='delete_summons'></form></td>
				  		</tr>
						";
					}
					else {
						echo "
				    	<td></td>
				  		</tr>
						";
					}
				$index++;
		  	}
		  	echo "</table>";
		  ?>
		
			
			<br><br>
		
	</div>

	<footer class="section-footer">
		<div class="section-footer-content" data-aos="fade-up">
			<div class="footer-credits">
				<p>Copyright &#169; 2020 | ASA Traffic Force</p>
			</div>
		</div>
	</footer>

	<script src="js/animation.js"></script>

</body>
</html>
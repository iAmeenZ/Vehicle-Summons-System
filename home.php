<?php include('php/session-user.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success2']); ?>
<?php unset($_SESSION['success3']); ?>
<?php unset($_SESSION['success4']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-home-user.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="background">

	<div class="error-div">
		<?php include('php/errors.php'); ?>
		<?php include('php/success.php'); ?>
	</div>

	<div class="nav">
		<div class="nav-image">
			<img src="images/logo.png" width="200px">
		</div>
		<div class="nav-tab">
			<div class="nav-tab-logout">
				<button onclick="location.href='php/logout.php'"><strong>Logout</strong></button>
			</div>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='profile.php'"><strong><i class='fas fa-user-alt'></i>&nbsp;&nbsp;<?php echo $_SESSION['username'] ?></strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='about.php'"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='home.php'" id="red-accent"><strong>Home</strong></button>
		</div>
	</div>

	<div id="login-modal" class="modal">
	    <div class="modal-content modal-card-4 modal-animate-top">
	      <header class="modal-container modal-teal"> 
	        <span onclick="document.getElementById('login-modal').style.display='none'" 
	        class="modal-display-topright"><strong>&times;</strong></span>
	        <h1 class="modal-textheader">Log In&nbsp;&nbsp;<i class='fas fa-portrait'></i></h1>
	      </header>
	      <div class="modal-main">
	      	<form>
		        <div class="modal-main-content">
		        	<img src="images/logo.png" width="200px" alt="Avatar" class="modal-img">
	        		<div class="group">      
				      <input type="text" required>
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Username</label>
				    </div>

				    <div class="group">      
				      <input type="text" required>
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Password</label>
				    </div>

				    <input type="submit" value="Log In">

				    <br><br>
				    <a href="register.php">Create an Account</a>
		        </div>
	        </form>
	      </div>
	    </div>
	</div>

	<div class="section1">
		<div class="section1-text">
			<h3>Welcome back, <?php echo $_SESSION['firstname'] ?>!</h3>
		</div>
		<div class="section2-btn">
			<button class="login-button" onclick="document.getElementById('add-vehicle').style.display='block';">&#10010; Add Vehicle</button>
		</div>
	</div>

	<div id="add-vehicle" class="modal-edit">
	    <div id="borderColor" class="modal-content modal-card-4 modal-animate-top">
	      <header id="headerColor" class="modal-container modal-teal"> 
	        <span onclick="document.getElementById('add-vehicle').style.display='none'" 
	        class="modal-display-topright"><strong>&times;</strong></span>
	        <h1 class="modal-textheader">Add Vehicle</h1>
	      </header>
	      <div class="modal-main">

	      	<div id="userDiv">
			    <div class="modal-main-content">
					<form method="post" action="home.php">
		        		<div class="group">
					      <input autocomplete="off" type="text" name="vehicleNo" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Vehicle No. (Eg. WWW123 / W1234G)</label>
					    </div><br><br>

					    <div class="vehicle-check">
						    <label class="container-cb">I agree this is my vehicle number and will get serious act in giving false information, <a href="#There-is-no-terms-and-conditions-hehe">Terms and Conditions</a>.
						    	<input type="checkbox" required>
							  <span class="checkmark-cb"></span>
							</label>
						</div>
						<br>

					    <button class="cancelEdit" type="button" onclick="document.getElementById('add-vehicle').style.display='none'">Cancel</button>
					    <button class="saveEdit" type="submit" name="add_vehicle">Add Vehicle</button>
					</form>
			    </div>
	        </div>

	      </div>
	    </div>
	</div>

	<div class="section2">

		<?php 

		  	$query = "SELECT * FROM vehicle WHERE username = '{$_SESSION['username']}'";
		  	$results = mysqli_query($db, $query);

		  	if (mysqli_num_rows($results) == 0) {
		  		echo "<h3 style='font-family:Trebuchet MS; color:rgba(0,0,0,0.8); text-align:center;'><i>You have not added any vehicles yet.</i><h3>";
		  	}

		  	while($row = $results->fetch_assoc()) {
		  		$currVehicle = $row['vehicleno'];
		  		$query_total = "SELECT * FROM summons WHERE vehicleno = '$currVehicle'";
		  		$results_total = mysqli_query($db, $query_total);
		  		$total = mysqli_num_rows($results_total);

		  		$query_notpaid = "SELECT * FROM summons WHERE vehicleno = '$currVehicle' AND summonspaid='Not paid'";
		  		$results_notpaid = mysqli_query($db, $query_notpaid);
		  		$totalnotpaid = mysqli_num_rows($results_notpaid);

		  		$query_paid = "SELECT * FROM summons WHERE vehicleno = '$currVehicle' AND summonspaid='Paid'";
		  		$results_paid = mysqli_query($db, $query_paid);
		  		$totalpaid = mysqli_num_rows($results_paid);

		  		echo "
		  		<form action='vehicle-single.php' method='post'>
				  	<div class='vehicle-card'>

			  			<input type='hidden' name='tempVehicle' value='" . $row["vehicleno"] . "' />

						<div class='vehicle-card-1'>
							<div class='vehicle-card-plate'>
								<div class='vehicle-card-plate-text'>
									<h1> " . $row["vehicleno"] . "</h1>
								</div>
							</div>
							<div class='vehicle-card-plate-desc'>

								<h4>Total Summons : " . $total . "</h4><br>
								<h4 style='color:rgba(234, 0, 0,0.8);'>Not paid : " . $totalnotpaid . "</h4>
								<h4 style='color:rgb(0, 185, 0);'>Paid : " . $totalpaid . "</h4>
							</div>
							<div class='vehicle-card-btn'>
	                          <button class='viewmore-btn' type='submit' name='vehicle_pay'>View more</button>
							</div>
						</div>
					</div>
				</form>
				";
		  	}
			  
		  ?>
		  <script>
		  	function doAction(action){
			    document.getElementById('action').value=action;
			}
		  </script>
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
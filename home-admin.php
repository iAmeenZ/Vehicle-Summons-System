<?php include('php/session-admin.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success5']); ?>
<?php unset($_SESSION['success6']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template-admin.css">
	<link rel="stylesheet" type="text/css" href="css/style-home-admin.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body class="background">

	<div class="error-div">
		<?php include('php/errors.php'); ?>
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
			<button onclick="location.href='home-admin.php'" id="red-accent"><strong>Home</strong></button>
		</div>
	</div>

	<div class="section1">
		<div class="section1-text">
			<h2>Welcome back, <?php echo $_SESSION['stafffirstname']; ?>!</h2>
		</div>
	</div>

	<div class="insert-label">
		<h1>Insert Summon</h1>
	</div>
	<div class="section2">
		<div class="section2-text">
			<label>Vehicle No.</label>
		</div>
		<form method="POST" action="home-admin.php" autocomplete="off">
			<input type="text" name="vehicleno">
			<input type="submit" value="Continue" name="vehicle_insert">
		</form>
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
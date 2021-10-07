<?php include('php/session-admin.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success5']); ?>
<?php unset($_SESSION['success6']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel="stylesheet" type="text/css" href="css/style-about.css">
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template-admin.css">
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
			<button onclick="location.href='about-admin.php'" id="red-accent"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='home-admin.php'"><strong>Home</strong></button>
		</div>
	</div>

	<div class="section1">
		<h1 class="section1-headerText">About Us</h1>
	</div>

	<div class="section2">
		<div class="section2-content">
			<div class="section2-img">
				<img src="images/logo.png" width="350px">
			</div>
			<div class="section2-desc"><br>
				<h1>ASA Traffic Force</h1><br><br><br>
				<p>ASA stands for Ameen Syahid Amir, followed by Traffic Force that<br>carries the meaning of a company involving road traffic. It is simply<br>a company that does not exist in the real world, but only for a project<br>and presentation.</p>
			</div>
			<br><br><br>
			<div class="section2-dev">
				<h1>Developers</h1>
			</div>
		</div>
		<table class='table-myvehicle'>
		  <tr>
		  	<th></th>
		  	<th>NAME</th>
		  	<th>STUDENT&nbsp;ID</th>
		    <th>NRIC</th>
		    <th>PROGRAM</th>
		    <th>GROUP</th>
		    <th>EMAIL</th>
		  </tr>
		  <tr>
		  	<td><img src="images/ameen.png" width="100px"></td>
		  	<td>NUR AMEERUL AMEEN BIN NOR HASSAN</td>
		  	<td>2018258096</td>
		  	<td>000209101495</td>
		  	<td>CS110 - FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES</td>
		  	<td>CS1105C</td>
		  	<td>ameerul8008@gmail.com</td>
		  </tr>
		  <tr>
		  	<td><img src="images/amir.png" width="100px"></td>
		  	<td>MUHAMMAD AMIR IQBAL BIN MOHD TARMIDZI</td>
		  	<td>2018233552</td>
		  	<td>000330060509</td>
		  	<td>CS110 - FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES</td>
		  	<td>CS1105C</td>
		  	<td>amiriqbbal3003@gmail.com</td>
		  </tr>
		  <tr>
		  	<td><img src="images/syahid.png" width="100px"></td>
		  	<td>SYAHID EZUAN BIN MOHD FADZIL</td>
		  	<td>2018256572</td>
		  	<td>000207100093</td>
		  	<td>CS110 - FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES</td>
		  	<td>CS1105C</td>
		  	<td>syahid.ezuan72@gmail.com</td>
		  </tr>
		</table>
	</div>



	<footer class="section-footer">
		<div class="section-footer-content" data-aos="fade-up">
			<div class="footer-credits">
				<p>Copyright &#169; 2020 | ASA Traffic Force</p>
			</div>
		</div>
	</footer>

	<script src="js/animation.js"></script>
	<script src="js/login-tab.js"></script>

</body>
</html>
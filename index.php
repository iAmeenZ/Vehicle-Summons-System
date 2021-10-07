<?php include('php/server.php') ?>
<?php unset($_SESSION['success4']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-index.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body class="background">

	<div class="error-div">
		<?php include('php/errors.php'); ?>
	</div>

	<div class="nav">
		<div class="nav-image">
			<img src="images/logo.png" width="200px">
		</div>
		<div class="nav-login">
			<button onclick="document.getElementById('login-modal').style.display='block'" class="login-button"><strong>Login</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='about-index.php'"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='index.php'" id="red-accent"><strong>Home</strong></button>
		</div>
	</div>

	<div id="login-modal" class="modal">
	    <div id="borderColor" class="modal-content modal-card-4 modal-animate-top">
	      <header id="headerColor" class="modal-container modal-teal"> 
	        <span onclick="document.getElementById('login-modal').style.display='none'" 
	        class="modal-display-topright"><strong>&times;</strong></span>
	        <h1 class="modal-textheader">Log In</h1>
	      </header>
	      <div class="modal-main">

	      	<div class="modal-tab">
		      	<button class="modal-tab-btn modal-tab-btn-user" id="userBtn" onclick="userTab()"><i class='fas fa-user-alt'></i> User</button>
		      	<button class="modal-tab-btn modal-tab-btn-admin" id="adminBtn" onclick="adminTab()"><i class='fas fa-user-shield'></i> Staff</button>
	      	</div>

	      	<div  id="userDiv">
		      	<form method="POST" action="index.php">
			        <div class="modal-main-content">
			        	<img src="images/logo.png" width="200px" alt="Avatar" class="modal-img">
		        		<div class="group">
					      <input autocomplete="off" type="text" name="username" value="<?php echo $username; ?>" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Username</label>
					    </div>

					    <div class="group">      
					      <input type="password" name="password" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Password</label>
					    </div>

					    <input type="submit" value="Log In" name="login_user">

					    <br><br>
					    <a href="register.php">Create an Account</a>
			        </div>
		        </form>
	        </div>

	        <div id="adminDiv" style="display: none;">
		      	<form method="POST" action="index.php">
			        <div class="modal-main-content">
			        	<img src="images/logo.png" width="200px" alt="Avatar" class="modal-img">
			        	
				        	<div class="modal-img-admin">STAFF</div>
			        		<div class="group">
						      <input autocomplete="off" type="text" name="staffid" required>
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Staff ID</label>
						    </div>

						    <div class="group">      
						      <input type="password" name="password" required>
						      <span class="highlight"></span>
						      <span class="bar"></span>
						      <label>Password</label>
						    </div>
					
					    <input id="submitBtn" type="submit" value="Log In" name="login_admin">

					    <br><br><br>
			        </div>
		        </form>
	        </div>


	      </div>
	    </div>
	</div>

	<div class="section1-right">
		<i class='fas fa-car'></i>
	</div>

	<div class="section1">
		<div class="section1-text">
			<h1>Online Summons<br>Payment</h1>
			<h5 class="section1-text-desc">No time to pay? We are here to help!</h5><br>
			<button class="getstart-button" onclick="location.href='register.php'"><strong>Get started!</strong></button>
		</div>
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
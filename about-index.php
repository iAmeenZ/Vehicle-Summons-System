<?php include('php/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-about.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
			<button onclick="location.href='about-index.php'" id="red-accent"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='index.php'"><strong>Home</strong></button>
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
		      	<form method="POST" action="about-index.php">
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
		      	<form method="POST" action="about-index.php">
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
		  	<td>XXXXXXXXXXXX</td>
		  	<td>CS110 - FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES</td>
		  	<td>CS1105C</td>
		  	<td>ameerul8008@gmail.com</td>
		  </tr>
		  <tr>
		  	<td><img src="images/amir.png" width="100px"></td>
		  	<td>MUHAMMAD AMIR IQBAL BIN MOHD TARMIDZI</td>
		  	<td>2018233552</td>
		  	<td>XXXXXXXXXXXX</td>
		  	<td>CS110 - FACULTY OF COMPUTER AND MATHEMATICAL SCIENCES</td>
		  	<td>CS1105C</td>
		  	<td>amiriqbbal3003@gmail.com</td>
		  </tr>
		  <tr>
		  	<td><img src="images/syahid.png" width="100px"></td>
		  	<td>SYAHID EZUAN BIN MOHD FADZIL</td>
		  	<td>2018256572</td>
		  	<td>XXXXXXXXXXXX</td>
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
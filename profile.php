<?php include('php/session-user.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success1']);
unset($_SESSION['success2']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-profile.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			<button onclick="location.href='profile.php'" id="red-accent"><strong><i class='fas fa-user-alt'></i>&nbsp;&nbsp;<?php echo $_SESSION['username'] ?></strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='about.php'"><strong>About</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='home.php'"><strong>Home</strong></button>
		</div>
	</div>

	<div class="section1">
		<h1 class="section1-headerText"><i class='fas fa-user-alt'></i>&nbsp;&nbsp;My Profile</h1>
	</div>

	<div class="section2">
		<div class="section2-content">
			<button class="pw-btn" onclick="document.getElementById('edit-pw').style.display='block';">Change Password</button>
			<br>
			<img src="images/default-user.png" width="300px">
			<div class="section2-row">
				<label>Username</label>
				<h2><?php echo $_SESSION['username']; ?></h2>
				<br><br>
				<label>Full Name</label>
				<h2><?php echo $_SESSION['fullname']; ?> <i onclick="editModal('Full Name', '<?php echo $_SESSION['fullname']; ?>', 'text', 'fullname')">&#xe22b;</i></h2>
				<br><br>
				<label>NRIC</label>
				<h2><?php echo $_SESSION['nric']; ?> <i onclick="editModal('NRIC', '<?php echo $_SESSION['nric']; ?>', 'number', 'nric')">&#xe22b;</i></h2>
			</div>
			<br>
			<div class="section2-row2">
				<label>Date of Birth</label>
				<h2><?php echo $_SESSION['dob']; ?> <i onclick="editModal('Date of Birth', '<?php echo $_SESSION['dob']; ?>', 'text', 'dob')">&#xe22b;</i></h2>
				<br><br>
				<label>Phone Number</label>
				<h2><?php echo $_SESSION['phonenum']; ?> <i onclick="editModal('Phone Number', '<?php echo $_SESSION['phonenum']; ?>', 'text', 'phonenum')">&#xe22b;</i></h2>
			</div>
			<div class="section2-row2">
				<label>Gender</label>
				<h2><?php echo $_SESSION['gender']; ?> <i onclick="editModal('Gender', '<?php echo $_SESSION['gender']; ?>', 'text', 'gender')">&#xe22b;</i></h2>
				<br><br>
				<label>Email</label>
				<h2><?php echo $_SESSION['email']; ?> <i onclick="editModal('Email', '<?php echo $_SESSION['email']; ?>', 'email', 'email')">&#xe22b;</i></h2>
			</div>
		</div>
	</div>

	<div id="edit-modal" class="modal-edit">
	    <div id="borderColor" class="modal-content modal-card-4 modal-animate-top">
	      <header id="headerColor" class="modal-container modal-teal"> 
	        <span onclick="document.getElementById('edit-modal').style.display='none'" 
	        class="modal-display-topright"><strong>&times;</strong></span>
	        <h1 class="modal-textheader">Edit Profile</h1>
	      </header>
	      <div class="modal-main">

	      	<div  id="userDiv">
			    <div class="modal-main-content">
					<form method="post" action="register.php">
		        		<div class="group">
					      <input id="editSession" autocomplete="off" name="editName" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label id="editType"></label>
					    </div>

					    <input id="editSessionRadio" type="radio" checked="checked" name="editRadio" style="display: none;">

					    <button class="cancelEdit" type="button" onclick="document.getElementById('edit-modal').style.display='none'">Cancel</button>
					    <button class="saveEdit" type="submit" name="edit_user">Save Changes</button>
					</form>
			    </div>
	        </div>

	      </div>
	    </div>
	</div>

	<div id="edit-pw" class="modal-edit">
	    <div id="borderColor" class="modal-content modal-card-4 modal-animate-top">
	      <header id="headerColor" class="modal-container modal-teal"> 
	        <span onclick="document.getElementById('edit-pw').style.display='none'" 
	        class="modal-display-topright"><strong>&times;</strong></span>
	        <h1 class="modal-textheader">Edit Profile</h1>
	      </header>
	      <div class="modal-main">

	      	<div  id="userDiv">
			    <div class="modal-main-content">
					<form method="post" action="profile.php">
		        		<div class="group">
					      <input type="Password" name="password_old" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Old Password</label><br>
					    </div>
					    <div class="group">
					      <input type="Password" name="password_1" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>New Password</label><br>
					    </div>
					    <div class="group">
					      <input type="Password" name="password_2" required>
					      <span class="highlight"></span>
					      <span class="bar"></span>
					      <label>Confirm New Password</label><br>
					    </div>

					    <button class="cancelEdit" type="button" onclick="document.getElementById('edit-pw').style.display='none'">Cancel</button>
					    <button class="saveEdit" type="submit" name="edit_user_pw">Save Changes</button>
					</form>
			    </div>
	        </div>

	      </div>
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

</body>
</html>
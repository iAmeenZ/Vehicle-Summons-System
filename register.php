<?php include('php/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-register.css">
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
		<div class="nav-login">
			<button onclick="document.getElementById('login-modal').style.display='block'" class="login-button"><strong>Login</strong></button>
		</div>
		<div class="nav-tab">
			<button onclick="location.href='about-index.php'"><strong>About</strong></button>
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
		      	<form method="POST" action="register.php">
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
		      	<form method="POST" action="register.php">
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
		<h1 class="section1-headerText">Create New Account</h1>
	</div>

	<div class="section2">
		<div class="section2-form">

			<form method="POST" action="register.php" autocomplete="off">

			<div class="register">      
		      <input type="text" name="username" value="<?php echo $username; ?>" required>
		      <span class="highlight"></span>
		      <span class="bar"></span>
		      <label>Username</label>
		    </div>

		    <div class="register">      
		      <input type="number" name="nric" value="<?php echo $nric; ?>" required>
		      <span class="highlight"></span>
		      <span class="bar"></span>
		      <label>NRIC (Without dash)</label>
		    </div>

		    <br>

		    <div class="register register-fullname">      
		      <input type="text" name="fullname" value="<?php echo $fullname; ?>" required>
		      <span class="highlight"></span>
		      <span class="bar"></span>
		      <label>Full Name</label>
		    </div>

		    <br>

		    <div class="register">      
		      <input type="number" name="phonenum" value="<?php echo $phonenum; ?>" required>
		      <span class="highlight"></span>
		      <span class="bar"></span>
		      <label>Phone Number (Without dash)</label>
		    </div>

		    <div class="register">      
		      <input type="text" name="email" value="<?php echo $email; ?>" required>
		      <span class="highlight"></span>
		      <span class="bar"></span>
		      <label>Email</label>
		    </div>

		    <br>
		    <div class="register-row">
		    	<label><strong>Date of Birth</strong></label><br><br>
		    	<select class="register-dob-select" name="dob_day" value="<?php echo $dob_day; ?>" required>
				    <option value="" disabled selected hidden>Day</option>
				    <option value="1">1</option><option value="2">2</option>
				    <option value="3">3</option><option value="4">4</option>
				    <option value="5">5</option><option value="6">6</option>
				    <option value="7">7</option><option value="8">8</option>
				    <option value="9">9</option><option value="10">10</option>
				    <option value="11">11</option><option value="12">12</option>
				    <option value="13">13</option><option value="14">14</option>
				    <option value="15">15</option><option value="16">16</option>
				    <option value="17">17</option><option value="18">18</option>
				    <option value="19">19</option><option value="20">20</option>
				    <option value="21">21</option><option value="22">22</option>
				    <option value="23">23</option><option value="24">24</option>
				    <option value="25">25</option><option value="26">26</option>
				    <option value="27">27</option><option value="28">28</option>
				    <option value="29">29</option><option value="30">30</option>
				    <option value="31">31</option>
				</select>
				<select class="register-dob-select" name="dob_month" value="<?php echo $dob_month; ?>" required>
				    <option value="" disabled selected hidden>Month</option>
				    <option value="January">January</option><option value="February">February</option>
				    <option value="March">March</option><option value="April">April</option>
				    <option value="May">May</option><option value="June">June</option>
				    <option value="July">July</option><option value="August">August</option>
				    <option value="September">September</option><option value="October">October</option>
				    <option value="November">November</option><option value="December">December</option>
				</select>
				<select class="register-dob-select" name="dob_year" value="<?php echo $dob_year; ?>" required>
				    <option value="" disabled selected hidden>Year</option>
				    <option value="2006">2006</option><option value="2005">2005</option>
				    <option value="2004">2004</option><option value="2003">2003</option>
				    <option value="2002">2002</option><option value="2001">2001</option>
				    <option value="2000">2000</option><option value="1999">1999</option>
				    <option value="1998">1998</option><option value="1997">1997</option>
				    <option value="1996">1996</option><option value="1995">1995</option>
				    <option value="1994">1994</option><option value="1993">1993</option>
				    <option value="1992">1992</option><option value="1991">1991</option>
				    <option value="1990">1990</option><option value="1989">1989</option>
				    <option value="1988">1988</option><option value="1987">1987</option>
				    <option value="1986">1986</option><option value="1985">1985</option>
				    <option value="1984">1984</option><option value="1983">1983</option>
				    <option value="1982">1982</option><option value="1981">1981</option>
				    <option value="1980">1980</option><option value="1979">1979</option>
				    <option value="1978">1978</option><option value="1977">1977</option>
				    <option value="1976">1976</option><option value="1975">1975</option>
				    <option value="1974">1974</option><option value="1973">1973</option>
				    <option value="1972">1972</option><option value="1971">1971</option>
				    <option value="1970">1970</option><option value="1969">1969</option>
				    <option value="1968">1968</option><option value="1967">1967</option>
				    <option value="1966">1966</option><option value="1965">1965</option>
				    <option value="1964">1964</option><option value="1963">1963</option>
				    <option value="1962">1962</option><option value="1961">1961</option>
				    <option value="1960">1960</option><option value="1959">1959</option>
				    <option value="1958">1958</option><option value="1957">1957</option>
				    <option value="1956">1956</option><option value="1955">1955</option>
				    <option value="1954">1954</option><option value="1953">1953</option>
				    <option value="1952">1952</option><option value="1951">1951</option>
				    <option value="1950">1950</option><option value="1949">1949</option>
				    <option value="1948">1948</option><option value="1947">1947</option>
				    <option value="1946">1946</option><option value="1945">1945</option>
				    <option value="1944">1944</option><option value="1943">1943</option>
				    <option value="1942">1942</option><option value="1941">1941</option>
				    <option value="1940">1940</option><option value="1939">1939</option>
				    <option value="1938">1938</option><option value="1937">1937</option>
				    <option value="1936">1936</option><option value="1935">1935</option>
				    <option value="1934">1934</option><option value="1933">1933</option>
				    <option value="1932">1932</option><option value="1931">1931</option>
				    <option value="1930">1930</option><option value="1929">1929</option>
				    <option value="1928">1928</option><option value="1927">1927</option>
				    <option value="1926">1926</option><option value="1925">1925</option>
				    <option value="1924">1924</option><option value="1923">1923</option>
				    <option value="1922">1922</option><option value="1921">1921</option>
				    <option value="1920">1920</option>
				</select>

				<div class="register-radio">
					<label><strong>Gender</strong></label><br><br>
    				<label class="register-radio-bullet">Male
					  <input type="radio" checked="checked" name="gender" value="Male">
					  <span class="checkmark"></span>
					</label>
					<label class="register-radio-bullet">Female
					  <input type="radio" name="gender" value="Female">
					  <span class="checkmark"></span>
					</label>
				</div>
			</div>

				<div class="pw-background">
					<div class="register">      
				      <input type="Password" name="password_1" required>
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Password</label>
				    </div>

				    <div class="register">      
				      <input type="Password" name="password_2" required>
				      <span class="highlight"></span>
				      <span class="bar"></span>
				      <label>Confirm Password</label>
				    </div>
			    </div>

			    <br><br>

			    <label class="container-cb">I agree to the <a href="#There-is-no-terms-and-conditions-hehe">Terms and Conditions</a>
				  <input type="checkbox" required>
				  <span class="checkmark-cb"></span>
				</label>

				<input type="submit" value="Register" name="reg_user">
			</form>
		   	
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
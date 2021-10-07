<?php include('php/session-admin.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success6']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template-admin.css">
	<link rel="stylesheet" type="text/css" href="css/style-insert-admin.css">
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
		<h1 class="section1-headerText"><?php echo $_SESSION['tempVehicle'] ?><button onclick="location.href='view-summons.php'">View Summons</button></h1>
	</div>

	<div class="section2">
		<div class="section2-form">

			<div class="section2-form-btn">
				<h3>Select Department</h3>
				<br>
				<button id="pdrm-btn" onclick="document.getElementById('pdrm-form').style.display = 'block';document.getElementById('jpj-form').style.display = 'none';document.getElementById('pdrm-btn').style.backgroundColor = 'rgb(100, 170, 255)';document.getElementById('jpj-btn').style.backgroundColor = 'transparent';document.getElementById('pdrm-btn').style.color = 'rgba(255,255,255,0.9)';document.getElementById('jpj-btn').style.color = 'rgba(0,0,0,0.8)';">PDRM</button>
				<button id="jpj-btn" onclick="document.getElementById('jpj-form').style.display = 'block';document.getElementById('pdrm-form').style.display = 'none';document.getElementById('jpj-btn').style.backgroundColor = 'rgb(100, 170, 255)';document.getElementById('pdrm-btn').style.backgroundColor = 'transparent';document.getElementById('jpj-btn').style.color = 'rgba(255,255,255,0.9)';document.getElementById('pdrm-btn').style.color = 'rgba(0,0,0,0.8)';">JPJ</button>
			</div>

			<form autocomplete="off" id="jpj-form" method="POST" action="insert-admin.php">

				<div class="register-row">
					<div class="register-row-date">
				    	<label><strong>&nbsp;&nbsp;Issued Date</strong></label><br>
				    	<select class="register-dob-select" name="summonsdate_day" required>
						    <option value="" disabled selected hidden>Day</option>
						    <option value="01">1</option><option value="02">2</option>
						    <option value="03">3</option><option value="04">4</option>
						    <option value="05">5</option><option value="06">6</option>
						    <option value="07">7</option><option value="08">8</option>
						    <option value="09">9</option><option value="10">10</option>
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
						<select class="register-dob-select" name="summonsdate_month" required>
						    <option value="" disabled selected hidden>Month</option>
						    <option value="01">January</option><option value="02">February</option>
						    <option value="03">March</option><option value="04">April</option>
						    <option value="05">May</option><option value="06">June</option>
						    <option value="07">July</option><option value="08">August</option>
						    <option value="09">September</option><option value="10">October</option>
						    <option value="11">November</option><option value="12">December</option>
						</select>
						<select class="register-dob-select" name="summonsdate_year" required>
						    <option value="" disabled selected hidden>Year</option>
						    <option value="2020">2020</option><option value="2021">2021</option>
						</select>
					</div>

					<div class="register-row-time">
						<label><strong>&nbsp;&nbsp;Issued Time (24-Hour Clock)</strong></label><br>
				    	<select class="register-dob-select" name="summonstime_hours" required>
						    <option value="" disabled selected hidden>Hours</option>
						    <option value="00">00</option>
						    <option value="01">01</option><option value="02">02</option>
						    <option value="03">03</option><option value="04">04</option>
						    <option value="05">05</option><option value="06">06</option>
						    <option value="07">07</option><option value="08">08</option>
						    <option value="09">09</option><option value="10">10</option>
						    <option value="11">11</option><option value="12">12</option>
						    <option value="13">13</option><option value="14">14</option>
						    <option value="15">15</option><option value="16">16</option>
						    <option value="17">17</option><option value="18">18</option>
						    <option value="19">19</option><option value="20">20</option>
						    <option value="21">21</option><option value="22">22</option>
						    <option value="23">23</option>
						</select>
						<select class="register-dob-select" name="summonstime_minutes" required>
						    <option value="" disabled selected hidden>Minutes</option>
						    <option value="00">00</option>
						    <option value="05">05</option><option value="10">10</option>
						    <option value="15">15</option><option value="20">20</option>
						    <option value="25">25</option><option value="30">30</option>
						    <option value="35">35</option><option value="40">40</option>
						    <option value="45">45</option><option value="50">50</option>
						    <option value="55">55</option>
						</select>
					</div>
				</div>

				<br><br>

				<div class="register-row">
				    <div class="register-row-date">
				    	<label><strong>&nbsp;&nbsp;Issued State</strong></label><br>
				    	<select class="register-dob-select" name="summonsstate" required>
						    <option value="" disabled selected hidden>Select state</option>
						    <option value="JOHOR">JOHOR</option><option value="KEDAH">KEDAH</option>
						    <option value="KELANTAN">KELANTAN</option><option value="MALACCA">MALACCA</option>
						    <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option><option value="PAHANG">PAHANG</option>
						    <option value="PENANG">PENANG</option><option value="PERAK">PERAK</option>
						    <option value="PERLIS">PERLIS</option><option value="SABAH">SABAH</option>
						    <option value="SARAWAK">SARAWAK</option><option value="SELANGOR">SELANGOR</option>
						    <option value="TERENGGANU">TERENGGANU</option><option value="KUALA LUMPUR">KUALA LUMPUR</option>
						    <option value="LABUAN">LABUAN</option><option value="PUTRAJAYA">PUTRAJAYA</option>
						</select>
					</div>
				</div>

				<br><br>

				<div class="register-row">
					<div class="register-row-1">
				      <label><strong>&nbsp;&nbsp;Offence Type</strong></label><br>
				    	<select onchange="this.className=this.options[this.selectedIndex].className; showDiv('hidden_div', this);" class="register-dob-select" name="summonsdetails" class="register-dob-select" name="summonsdetails" required>
						    <option value="" disabled selected hidden>Select offence</option>
						    <?php
						    	$query = "SELECT * FROM offence WHERE offencedepart='JPJ'";
						    	$result = mysqli_query($db, $query);

						    	while($row = mysqli_fetch_array($result)) {
						    		echo "
						    			<option class='dropdownText' value='" . $row['offenceid'] . $row['offenceprice'] . "'>" . $row['offenceid'] . " - " . $row['offencedetails'] . "</option>
						    		";
						    	}
						    ?>
						</select>
					</div>
					<div class="register-row-2">
						<h3 id="hidden_div"></h3>
					</div>
			    </div>

			    <script>
			    	function showDiv(divId, element) {
			    		var pricetext = 'RM'+element.value.substring(6,9)+'.00';
					    document.getElementById(divId).innerHTML = pricetext;
					}
			    </script>

			    <br><br>

			    <div class="register register-fullname">      
			      <input type="text" name="summonsdesc" value="<?php echo $summonsdesc; ?>">
			      <span class="highlight"></span>
			      <span class="bar"></span>
			      <label>Description (optional)</label>
			    </div>

			    <br><br><br><br>

			    <label class="container-cb">I agree to the <a href="#There-is-no-terms-and-conditions-hehe">Terms and Conditions</a>.
				  <input type="checkbox" required>
				  <span class="checkmark-cb"></span>
				</label>

				<input type="submit" value="Submit" name="submit_summons_jpj">
			</form>



			<form autocomplete="off" id="pdrm-form" method="POST" action="insert-admin.php">

				<div class="register-row">
					<div class="register-row-date">
				    	<label><strong>&nbsp;&nbsp;Issued Date</strong></label><br>
				    	<select class="register-dob-select" name="summonsdate_day" required>
						    <option value="" disabled selected hidden>Day</option>
						    <option value="01">1</option><option value="02">2</option>
						    <option value="03">3</option><option value="04">4</option>
						    <option value="05">5</option><option value="06">6</option>
						    <option value="07">7</option><option value="08">8</option>
						    <option value="09">9</option><option value="10">10</option>
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
						<select class="register-dob-select" name="summonsdate_month" required>
						    <option value="" disabled selected hidden>Month</option>
						    <option value="01">January</option><option value="02">February</option>
						    <option value="03">March</option><option value="04">April</option>
						    <option value="05">May</option><option value="06">June</option>
						    <option value="07">July</option><option value="08">August</option>
						    <option value="09">September</option><option value="10">October</option>
						    <option value="11">November</option><option value="12">December</option>
						</select>
						<select class="register-dob-select" name="summonsdate_year" required>
						    <option value="" disabled selected hidden>Year</option>
						    <option value="2020">2020</option><option value="2021">2021</option>
						</select>
					</div>

					<div class="register-row-time">
						<label><strong>&nbsp;&nbsp;Issued Time (24-Hour Clock)</strong></label><br>
				    	<select class="register-dob-select" name="summonstime_hours" required>
						    <option value="" disabled selected hidden>Hours</option>
						    <option value="00">00</option>
						    <option value="01">01</option><option value="02">02</option>
						    <option value="03">03</option><option value="04">04</option>
						    <option value="05">05</option><option value="06">06</option>
						    <option value="07">07</option><option value="08">08</option>
						    <option value="09">09</option><option value="10">10</option>
						    <option value="11">11</option><option value="12">12</option>
						    <option value="13">13</option><option value="14">14</option>
						    <option value="15">15</option><option value="16">16</option>
						    <option value="17">17</option><option value="18">18</option>
						    <option value="19">19</option><option value="20">20</option>
						    <option value="21">21</option><option value="22">22</option>
						    <option value="23">23</option>
						</select>
						<select class="register-dob-select" name="summonstime_minutes" required>
						    <option value="" disabled selected hidden>Minutes</option>
						    <option value="00">00</option>
						    <option value="05">05</option><option value="10">10</option>
						    <option value="15">15</option><option value="20">20</option>
						    <option value="25">25</option><option value="30">30</option>
						    <option value="35">35</option><option value="40">40</option>
						    <option value="45">45</option><option value="50">50</option>
						    <option value="55">55</option>
						</select>
					</div>
				</div>

				<br><br>

				<div class="register-row">
				    <div class="register-row-date">
				    	<label><strong>&nbsp;&nbsp;Issued State</strong></label><br>
				    	<select class="register-dob-select" name="summonsstate" required>
						    <option value="" disabled selected hidden>Select state</option>
						    <option value="JOHOR">JOHOR</option><option value="KEDAH">KEDAH</option>
						    <option value="KELANTAN">KELANTAN</option><option value="MALACCA">MALACCA</option>
						    <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option><option value="PAHANG">PAHANG</option>
						    <option value="PENANG">PENANG</option><option value="PERAK">PERAK</option>
						    <option value="PERLIS">PERLIS</option><option value="SABAH">SABAH</option>
						    <option value="SARAWAK">SARAWAK</option><option value="SELANGOR">SELANGOR</option>
						    <option value="TERENGGANU">TERENGGANU</option><option value="KUALA LUMPUR">KUALA LUMPUR</option>
						    <option value="LABUAN">LABUAN</option><option value="PUTRAJAYA">PUTRAJAYA</option>
						</select>
					</div>
				</div>

				<br><br>

				<div class="register-row">
					<div class="register-row-1">
				      <label><strong>&nbsp;&nbsp;Offence Type</strong></label><br>
				    	<select onchange="this.className=this.options[this.selectedIndex].className; showDiv2('hidden_div2', this);" class="register-dob-select" name="summonsdetails" required>
						    <option value="" disabled selected hidden>Select offence</option>
						    <?php
						    	$query = "SELECT * FROM offence WHERE offencedepart='PDRM'";
						    	$result = mysqli_query($db, $query);

						    	while($row = mysqli_fetch_array($result)) {
						    		echo "
						    			<option class='dropdownText' value='" . $row['offenceid'] . $row['offenceprice'] . "'>" . $row['offenceid'] . " - " . $row['offencedetails'] . "</option>
						    		";
						    	}
						    ?>
						</select>
					</div>  
			    	<div class="register-row-2">
						<h3 id="hidden_div2"></h3>
					</div>
			    </div>

			    <script>
			    	function showDiv2(divId, element) {
			    		var pricetext = 'RM'+element.value.substring(7,10)+'.00';
					    document.getElementById(divId).innerHTML = pricetext;
					}
			    </script>

			    <script>
			    	var select = document.getElementById('mySelect');
					select.onchange = function () {
					    select.className = this.options[this.selectedIndex].className;
					}
			    </script>
			    

			    <br><br>

			    <div class="register register-fullname">      
			      <input type="text" name="summonsdesc" value="<?php echo $summonsdesc; ?>">
			      <span class="highlight"></span>
			      <span class="bar"></span>
			      <label>Description (optional)</label>
			    </div>
			    

			    <br><br><br><br>

			    <label class="container-cb">I agree to the <a href="#There-is-no-terms-and-conditions-hehe">Terms and Conditions</a>.
				  <input type="checkbox" required>
				  <span class="checkmark-cb"></span>
				</label>

				<input type="submit" value="Submit" name="submit_summons_pdrm">
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

</body>
</html>
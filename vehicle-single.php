<?php include('php/session-user.php') ?>
<?php include('php/server.php') ?>
<?php unset($_SESSION['success1']); ?>

<!DOCTYPE html>
<html>
<head>
	<title>ASA Traffic Force</title>
	<link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<link rel="stylesheet" type="text/css" href="css/style-vehicle-single.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
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
			<button onclick="location.href='home.php'"><strong>Home</strong></button>
		</div>
	</div>

	<div class="section1">
		<h1 class="section1-headerText"><?php echo $_SESSION['tempVehicle'] ?></h1>
	</div>

	<div class="section2">

		<div class="sort-btn">
			<br>
			<button id="pdrm-btn" onclick="document.getElementById('notpaid-div').style.display = 'block';document.getElementById('paid-div').style.display = 'none';document.getElementById('pdrm-btn').style.backgroundColor = 'rgb(250, 100, 100)';document.getElementById('jpj-btn').style.backgroundColor = 'transparent';document.getElementById('pdrm-btn').style.color = 'rgba(255,255,255,0.9)';document.getElementById('jpj-btn').style.color = 'rgba(0,0,0,0.8)';">Not Paid</button>
			<button id="jpj-btn" onclick="document.getElementById('paid-div').style.display = 'block';document.getElementById('notpaid-div').style.display = 'none';document.getElementById('jpj-btn').style.backgroundColor = 'rgb(250, 100, 100)';document.getElementById('pdrm-btn').style.backgroundColor = 'transparent';document.getElementById('jpj-btn').style.color = 'rgba(255,255,255,0.9)';document.getElementById('pdrm-btn').style.color = 'rgba(0,0,0,0.8)';">Paid</button>
		</div>
		
		<form id="notpaid-div" method="POST" action="vehicle-single.php">
			
		  <?php 
		  
		  	$query = "SELECT * FROM summons WHERE vehicleno='{$_SESSION['tempVehicle']}' AND summonspaid='Not paid'";
		  	$results = mysqli_query($db, $query);
		  	$index = 1;

		  	echo "
				  <table id='myTable' class='table-myvehicle'>
				  <tr>
				  	<th>NO.</th>
				  	<th>SUMMONS NO.</th>
				  	<th>DEPARTMENT</th>
				    <th>ISSUED STATE</th>
				    <th>OFFENCE DATE/TIME</th>
				    <th>OFFENCE DETAILS</th>
				    <th>AMOUNT(RM)</th>
				    <th>STATUS</th>
				    <th></th>
				  </tr>
			  	";

		  	if (mysqli_num_rows($results) == 0) {
		  		echo "<h3 style='font-family:Trebuchet MS; color:rgba(0,0,0,0.8); text-align:center;'><i>Great news! This vehicle have no unpaid   summons.</i><h3><br><br>";
		  	}

		  	echo "
			  	<div class='search-input'>
					<input type='text' class='searchClass' id='myInput' onkeyup='searchFunction()' placeholder='Search for keyword..' title='Type in a name'>
				</div>";


		  	while($row = $results->fetch_assoc()) {
		  		echo "
				  <tr style='height:3em;'>
				  	<td>" . $index . ".</td>
				    <td>" . $row['summonsno'] . "</td>
				    <td>" . $row['summonsdepart'] . "</td>
				    <td>" . $row['summonsstate'] . "</td>
				    <td>" . $row['summonsdate'] . " " . $row['summonstime'] . "</td>
				    <td>" . $row['summonsdetails'] . "</td>
				    <td>" . $row['summonsprice'] . "</td>
				    <td style='color:rgba(255,0,0,0.7); font-style: italic; font-weight:bold; '>" . $row['summonspaid'] . "</td>
				    <td style='text-align:center'><input style='width:20px; height:20px;' type='checkbox' name='summonsNo[]' value='" . $row['summonsno'] . "'></td>
				  </tr>
				";
				$index++;
		  	}
		  	echo "</table>";
		  	if (mysqli_num_rows($results) != 0) {
		  		echo "<br><br>
					<div class='payDiv'>
						<div class='payDiv-right'>
							<input class='pay-button' name='summons_checkout' type='submit' value='Checkout' id='checkBtn'>
						</div>
					</div>";
		  	}
		  ?>
		
			
			<br><br>
		</form>


		<div id="paid-div">
		  <?php 
		  
		  	$query_paid = "SELECT * FROM summons WHERE vehicleno='{$_SESSION['tempVehicle']}' AND summonspaid='Paid'";
		  	$results_paid = mysqli_query($db, $query_paid);
		  	$index = 1;

		  	echo "
				  <table id='myTable2' class='table-myvehicle'>
				  <tr>
				  	<th>NO.</th>
				  	<th>SUMMONS NO.</th>
				  	<th>DEPARTMENT</th>
				    <th>ISSUED STATE</th>
				    <th>OFFENCE DATE/TIME</th>
				    <th>OFFENCE DETAILS</th>
				    <th>AMOUNT(RM)</th>
				    <th>STATUS</th>
				  </tr>
			  	";

		  	if (mysqli_num_rows($results_paid) == 0) {
		  		echo "<h3 style='font-family:Trebuchet MS; color:rgba(0,0,0,0.8); text-align:center;'><i>This vehicle have no paid summons.</i><h3><br><br>";
		  	}
		  	
		  	echo "
			  	<div class='search-input'>
					<input type='text' class='searchClass' id='myInput2' onkeyup='searchFunction2()' placeholder='Search for keyword..' title='Type in a name'>
				</div>";
		  	

		  	while($row = $results_paid->fetch_assoc()) {
		  		echo "
				  <tr style='height:3em;'>
				  	<td>" . $index . ".</td>
				    <td>" . $row['summonsno'] . "</td>
				    <td>" . $row['summonsdepart'] . "</td>
				    <td>" . $row['summonsstate'] . "</td>
				    <td>" . $row['summonsdate'] . " " . $row['summonstime'] . "</td>
				    <td>" . $row['summonsdetails'] . "</td>
				    <td>" . $row['summonsprice'] . "</td>
				    <td style='color:rgba(0,190,0,0.7); font-style: italic; font-weight:bold; '>" . $row['summonspaid'] . "</td>
				  </tr>
				";
				$index++;
		  	}
		  	echo "</table>";
		  ?>
		
			
			<br><br>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function () {
		    $('#checkBtn').click(function() {
		      checked = $("input[type=checkbox]:checked").length;

		      if(!checked) {
		        alert("You must check at least 1 summons.");
		        return false;
		      }

		    });
		});
	</script>


	<footer class="section-footer">
		<div class="section-footer-content" data-aos="fade-up">
			<div class="footer-credits">
				<p>Copyright &#169; 2020 | ASA Traffic Force</p>
			</div>
		</div>
	</footer>

	<script src="js/animation.js"></script>
	<script src="js/search.js"></script>

</body>
</html>
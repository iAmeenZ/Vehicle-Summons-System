<?php
  if(!isset($_SESSION)) { 
      session_start(); 
  } 

  $db = mysqli_connect('localhost', 'root', '', 'asa_traffic');
  //$db = mysqli_connect('localhost', 'csc36418', 'Ql0kk8!9', 'csc36418');

  $username = "";
  $nric = "";
  $fullname = "";
  $phonenum = "";
  $email = "";
  $gender = "";
  $dob_day = "";
  $dob_month = "";
  $dob_year = "";
  $dob = "";
  $staffid = "";
  $errors = array();

  // ================ REGISTER USER ===================================
  if (isset($_POST['reg_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $nric = mysqli_real_escape_string($db, $_POST['nric']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $dob_day = mysqli_real_escape_string($db, $_POST['dob_day']);
    $dob_month = mysqli_real_escape_string($db, $_POST['dob_month']);
    $dob_year = mysqli_real_escape_string($db, $_POST['dob_year']);

    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // If user already exists
    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' OR nric='$nric' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }

      if ($user['nric'] === $nric) {
        array_push($errors, "NRIC already exists");
      }
    }

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
       array_push($errors, "The passwords don't match");
    }

    $dob = "${dob_day} ${dob_month} ${dob_year}";

    // Register
    if (count($errors) == 0) {
    	$password = md5($password_1); // Encryption

    	$query = "INSERT INTO user (username, nric, fullname, phonenum, email, dob, gender, password) 
    			  VALUES('$username', '$nric', '$fullname', '$phonenum', '$email', '$dob', '$gender', '$password')";
    	mysqli_query($db, $query);
      $_SESSION['success4'] = "Your account has been registered.";
    	header('location: register.php');
    }
  }



  // ================ LOGIN USER ===================================
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['nric'] = $row["nric"];
      $_SESSION['fullname'] = $row["fullname"];
      $_SESSION['phonenum'] = $row["phonenum"];
      $_SESSION['email'] = $row["email"];
      $_SESSION['dob'] = $row["dob"];
      $_SESSION['gender'] = $row["gender"];

      $index = strpos(strtoupper($row['fullname']), " BIN");
      $_SESSION['firstname'] = substr($row['fullname'], 0, $index);

      header('location: home.php');
    }else {
      $query_check = "SELECT * FROM user WHERE username='$username'";
      $results_check = mysqli_query($db, $query_check);
      if (mysqli_num_rows($results_check) == 0) {
        array_push($errors, "Username does not exists");
      }
      else {
        array_push($errors, "Incorrect password");
      }
    }
  }


  // ================ LOGIN ADMIN ===================================
  if (isset($_POST['login_admin'])) {
    $staffid = mysqli_real_escape_string($db, $_POST['staffid']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM admin WHERE staffid='$staffid' AND password='$password'";
    $results = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['staffid'] = $staffid;
      $_SESSION['staffname'] = $row["staffname"];
      $index = strpos(strtoupper($row['staffname']), " BIN");
      $_SESSION['stafffirstname'] = substr($row['staffname'], 0, $index);
      if (str_word_count($_SESSION['stafffirstname']) < 1) {
        $_SESSION['stafffirstname'] = $row["staffname"];
      }

      header('location: home-admin.php');
    }else {
      $query_check = "SELECT * FROM admin WHERE staffid='$staffid'";
      $results_check = mysqli_query($db, $query_check);
      if (mysqli_num_rows($results_check) == 0) {
        array_push($errors, "Staff ID does not exists");
      }
      else {
        array_push($errors, "Incorrect password");
      }
    }
  }


  // ================ EDIT PROFILE ===================================
  if (isset($_POST['edit_user'])) {

    $editName = mysqli_real_escape_string($db, $_POST['editName']);
    $attr = mysqli_real_escape_string($db, $_POST['editRadio']);

    $query = "UPDATE user SET $attr='$editName' WHERE username='{$_SESSION['username']}'";
    $results = mysqli_query($db, $query);

    $_SESSION[$attr] = $editName;

    $_SESSION['success3'] = "Profile updated.";

    header('location: profile.php');
  }

  if (isset($_POST['edit_user_pw'])) {

    $password_old = mysqli_real_escape_string($db, $_POST['password_old']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $query_old_pw = "SELECT * FROM user WHERE username='{$_SESSION['username']}'";
    $results_old_pw = mysqli_query($db, $query_old_pw);
    $row = mysqli_fetch_assoc($results_old_pw);
    $password_old_enc = md5($password_old);

    if ($password_old_enc != $row['password']) {
        array_push($errors, "Incorrect old password");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "New passwords don't match");
    }

    if (count($errors) == 0) {
      $password = md5($password_1);
      $query = "UPDATE user SET password='$password' WHERE username='{$_SESSION['username']}'";
      $results = mysqli_query($db, $query);

      $_SESSION['success3'] = "New password has been updated.";

      header('location: profile.php');
    }
  }


  // ================ ADD VEHICLE ===================================
  if (isset($_POST['add_vehicle'])) {

    $vehicleno = mysqli_real_escape_string($db, strtoupper($_POST['vehicleNo']));

    $query_check = "SELECT * FROM vehicle WHERE vehicleno='$vehicleno'";
    $results_check = mysqli_query($db, $query_check);
    $vehicle = mysqli_fetch_assoc($results_check);

    if ($vehicle['vehicleno'] === $vehicleno) {
        array_push($errors, "\"$vehicleno\" already registered");
    }

    if (count($errors) == 0) {
      $query = "INSERT INTO vehicle (vehicleno, username) VALUES ('$vehicleno', '{$_SESSION['username']}')";
      $results = mysqli_query($db, $query);
      $_SESSION['success1'] = "A vehicle has been registered. Vehicle No: <strong>$vehicleno</strong>";
      header('location: home.php');
    }
  }

  // ================ GO SINGLE VEHICLE PAGE (USER) ===================================
  if (isset($_POST['vehicle_pay'])) {

    $getVehicle = mysqli_real_escape_string($db, $_POST['tempVehicle']);

    $_SESSION['tempVehicle'] = $getVehicle;
    header('location: vehicle-single.php');
  }

  // ================ GO SINGLE VEHICLE PAGE (ADMIN) ===================================
  if (isset($_POST['vehicle_insert'])) {

    $vehicleno = mysqli_real_escape_string($db, strtoupper($_POST['vehicleno']));

    $query = "SELECT * FROM vehicle WHERE vehicleno='$vehicleno' LIMIT 1";
    $result = mysqli_query($db, $query);
    $vehicle = mysqli_fetch_assoc($result);

    if (!$vehicle) {
        array_push($errors, "\"$vehicleno\" is not registered in this system");
    }

    if (count($errors) == 0) {
      $_SESSION['tempVehicle'] = $vehicleno;
      $_SESSION['tempUser'] = $vehicle['username'];
      header('location: insert-admin.php');
    }
  }

  
  // ================ SUBMIT SUMMONS PDRM (ADMIN) ==================================
  $summonsdesc = "";
  if (isset($_POST['submit_summons_pdrm'])) {

    $summonsdate_day = mysqli_real_escape_string($db, $_POST['summonsdate_day']);
    $summonsdate_month = mysqli_real_escape_string($db, $_POST['summonsdate_month']);
    $summonsdate_year = mysqli_real_escape_string($db, $_POST['summonsdate_year']);
    $summonstime_hours = mysqli_real_escape_string($db, $_POST['summonstime_hours']);
    $summonstime_minutes = mysqli_real_escape_string($db, $_POST['summonstime_minutes']);
    $summonsstate = mysqli_real_escape_string($db, $_POST['summonsstate']);
    $summonsdesc = mysqli_real_escape_string($db, $_POST['summonsdesc']);
    $summonsusername = $_SESSION['tempUser'];
    $summonsstaff = $_SESSION['staffid'];
    $summonsoffence = mysqli_real_escape_string($db, substr($_POST['summonsdetails'], 0, 7));
    $summonsvehicle = $_SESSION['tempVehicle'];

    $query_details = "SELECT * FROM offence WHERE offenceid='$summonsoffence'";
    $result_details = mysqli_query($db, $query_details);
    $offence = mysqli_fetch_assoc($result_details);

    $summonsdetails = $offence['offencedetails'];
    $summonsprice = $offence['offenceprice'];

    $summonsno = "{$summonsoffence}{$summonsdate_day}{$summonsdate_month}{$summonsdate_year}{$summonstime_hours}{$summonstime_minutes}";

    $query = "INSERT INTO summons VALUES ('$summonsno', '{$summonsdate_day}-{$summonsdate_month}-{$summonsdate_year}', '{$summonstime_hours}:{$summonstime_minutes}', '{$summonsstate}', '{$summonsdetails}', '{$summonsprice}', '{$summonsdesc}', 'PDRM', 'Not paid', '{$summonsusername}', '{$summonsstaff}', '{$summonsoffence}', '{$summonsvehicle}')";
    mysqli_query($db, $query);

    $_SESSION['success5'] = "A summons has been filed. Summons No: <strong>$summonsno</strong>";

    header('location: insert-admin.php');
  }

  // ================ SUBMIT SUMMONS JPJ (ADMIN) ==================================
  if (isset($_POST['submit_summons_jpj'])) {

    $summonsdate_day = mysqli_real_escape_string($db, $_POST['summonsdate_day']);
    $summonsdate_month = mysqli_real_escape_string($db, $_POST['summonsdate_month']);
    $summonsdate_year = mysqli_real_escape_string($db, $_POST['summonsdate_year']);
    $summonstime_hours = mysqli_real_escape_string($db, $_POST['summonstime_hours']);
    $summonstime_minutes = mysqli_real_escape_string($db, $_POST['summonstime_minutes']);
    $summonsstate = mysqli_real_escape_string($db, $_POST['summonsstate']);
    $summonsdesc = mysqli_real_escape_string($db, $_POST['summonsdesc']);
    $summonsusername = $_SESSION['tempUser'];
    $summonsstaff = $_SESSION['staffid'];
    $summonsoffence = mysqli_real_escape_string($db, substr($_POST['summonsdetails'], 0, 6));
    $summonsvehicle = $_SESSION['tempVehicle'];

    $query_details = "SELECT * FROM offence WHERE offenceid='$summonsoffence'";
    $result_details = mysqli_query($db, $query_details);
    $offence = mysqli_fetch_assoc($result_details);

    $summonsdetails = $offence['offencedetails'];
    $summonsprice = $offence['offenceprice'];

    $summonsno = "{$summonsoffence}{$summonsdate_day}{$summonsdate_month}{$summonsdate_year}{$summonstime_hours}{$summonstime_minutes}";

    $query = "INSERT INTO summons VALUES ('$summonsno', '{$summonsdate_day}-{$summonsdate_month}-{$summonsdate_year}', '{$summonstime_hours}:{$summonstime_minutes}', '{$summonsstate}', '{$summonsdetails}', '{$summonsprice}', '{$summonsdesc}', 'JPJ', 'Not paid', '{$summonsusername}', '{$summonsstaff}', '{$summonsoffence}', '{$summonsvehicle}')";
    mysqli_query($db, $query);

    $_SESSION['success5'] = "A summons has been filed. Summons No: <strong>$summonsno</strong>";

    header('location: insert-admin.php');
  }

  // ================ SUMMONS CHECKOUT ==================================
  if (isset($_POST['summons_checkout'])) {

    $_SESSION['summonsNo'] = $_POST['summonsNo'];

    header('location: checkout.php');
  }

  // ================ CONFIRM PAYMENT ==================================
  if (isset($_POST['confirm_pay'])) {

    $password = mysqli_real_escape_string($db, $_POST['password']);

    $query = "SELECT * FROM user WHERE username='{$_SESSION['username']}'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $password_enc = md5($password);

    if ($password_enc != $row['password']) {
        array_push($errors, "Incorrect password");
    }

    if (count($errors) == 0) {
      $count = count($_SESSION['summonsNo']);
      for ($i=0; $i < $count; $i++) {
        $query = "UPDATE summons SET summonspaid='Paid' WHERE summonsno='{$_SESSION['summonsNo'][$i]}'";
        mysqli_query($db, $query);
      }

      $_SESSION['success2'] = "$count summons has been paid.";
      
      header('location: vehicle-single.php');
    }
  }

  // ================ DELETE SUMMONS ==================================
  if (isset($_POST['delete_summons'])) {

    $tempSummons = mysqli_real_escape_string($db, $_POST['tempSummons']);

    $query = "DELETE FROM summons WHERE summonsno='$tempSummons'";
    $result = mysqli_query($db, $query);

    $_SESSION['success6'] = "Summons has been deleted. Summons No: <strong>$tempSummons</strong>";
      
    header('location: view-summons.php');
  }

?>
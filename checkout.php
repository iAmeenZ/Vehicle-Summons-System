<?php include('php/session-user.php') ?>
<?php include('php/server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>ASA Traffic Force</title>
  <link rel = "icon" href = "images/logo.png" type = "image/x-icon"> 
  <link rel="stylesheet" type="text/css" href="css/template.css">
  <link rel="stylesheet" type="text/css" href="css/style-checkout.css">
  <link rel="stylesheet" type="text/css" href="css/modal.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <h1 class="section1-headerText">Checkout</h1>
  </div>

<form action="checkout.php" method="POST">
  <div id="confirm-modal" class="modal-edit">
      <div id="borderColor" class="modal-content modal-card-4 modal-animate-top">
        <header id="headerColor" class="modal-container modal-teal"> 
          <span onclick="document.getElementById('confirm-modal').style.display='none'" 
          class="modal-display-topright"><strong>&times;</strong></span>
          <h1 class="modal-textheader">Payment Confirmation</h1>
        </header>
        <div class="modal-main">

          <div  id="userDiv">
          <div class="modal-main-content">
          <form method="post" action="register.php">
                <div class="group">
                <input autocomplete="off" name="password" type="password" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label id="editType">Password</label>
              </div>

              <button class="cancelEdit" type="button" onclick="document.getElementById('confirm-modal').style.display='none'">Cancel</button>
              <button class="saveEdit" type="submit" name="confirm_pay">Confirm Pay</button>
          </form>
          </div>
          </div>

        </div>
      </div>
  </div>

  <div class="section2">
    <div class="section2-table">
      <table class="table-myvehicle">
        <br>
        <tr>
          <th width="10px">No.</th>
          <th>Summons No.</h>
          <th width="20%" id="table-right">Amount (RM)</th>
        </tr>
        <?php 

        $count = count($_SESSION['summonsNo']);
        $subtotal = 0;
          for ($i=0; $i < $count; $i++) {
            $query = "SELECT * FROM summons WHERE summonsno='{$_SESSION['summonsNo'][$i]}'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
            $subtotal = $subtotal + $row['summonsprice'];
            echo 
            "<tr>" .
              "<td>" . ($i+1) . ".</td>" .
              "<td>" . $_SESSION['summonsNo'][$i] . "</td>" .
              "<td class='table-right'>" . number_format($row['summonsprice'],2) . "</td>" .
            "</tr>"
            ;
          }
          $servCharge = 1.5 * $count;
          $sst = $subtotal * 0.06;
          $total = $subtotal + $servCharge + $sst;

          echo "
          <tr>
             <td colspan='2'><span style='color:transparent;'>a</span></td>
             <td></td>
            </tr>
            <tr>
             <td class='table-right' colspan='2'>Subtotal</td>
             <td class='table-right'>" . number_format($subtotal,2) . "</td>
            </tr>
            <tr>
             <td class='table-right' colspan='2'>Service Charge</td>
             <td class='table-right'>" . number_format($servCharge,2) . "</td>
            </tr>
            <tr>
             <td class='table-right' colspan='2'>SST (6%)</td>
             <td class='table-right'>" . number_format($sst,2) . "</td>
            </tr>
            <tr>
             <td colspan='2'><span style='color:transparent;'>a</span></td>
             <td></td>
            </tr>
            <tr>
             <td class='table-right' colspan='2'><strong>TOTAL (RM)</strong></td>
             <td class='table-right'><strong>" . number_format($total,2) . "</strong></td>
            </tr>
            ";
         ?>
       </table>
       <br><br>
       <div class="section-btn">
        <button class="cancelEdit" type="button" onclick="location.href='vehicle-single.php'">Back</button>
        <button onclick="document.getElementById('confirm-modal').style.display='block'" class="saveEdit">Pay</button>
        </div>
     </div>
  </div>

</form>

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
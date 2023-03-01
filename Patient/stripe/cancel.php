<?php 
session_start();
require_once("/xampp/htdocs/Royalhospital/conf/config.php");
$_SESSION['appID_array'][] = '';
if(isset($_SESSION['mailaddress']) && $_SESSION['userRole'] == 'Patient'){
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout canceled</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="<?php echo BASEURL.'/css/style.css';?>">
    <link rel="stylesheet" href="<?php echo BASEURL.'/css/patientDash.css';?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?php echo BASEURL. '/js/getDocDetails.js'; ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASEURL .'/css/appoinment.css';?>">
    <link rel="stylesheet" href="<?php echo BASEURL.'/css/patientAppointment.css' ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/04b61c29c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
  <div class="u">
  <?php
          $name = urlencode( $_SESSION['name']);
          include(BASEURL.'/Components/patientTopbar.php?profilePic=' . $_SESSION['profilePic'] . "&name=" . $name . "&userRole=" . $_SESSION['userRole']. "&nic=" . $_SESSION['nic']);

          ?>  
            
            <ul>
                <li class="userType"><img src="<?php echo BASEURL.'/images/userInPage.svg' ?>" alt="">
                Patient
            </li>
            </ul>
  </div>
        
  <div class="box1">
    <img src="<?php echo BASEURL.'/images/p-cancel.png'?>" alt="">
    <div class="product">
      <h2>Transaction Cancelled</h2>
    <div class="description">
    <p>Forgot to add something to your cart? Shop around then come back to pay!</p>
      <a href="mailto:orders@example.com">orders@example.com</a>.
    </div>
    </div>
  </div>
</body>
</html>
<?php 
}
?>
<?php
session_start();
//die( $_SESSION['profilePic']);
require_once("../conf/config.php");
if (isset($_SESSION['mailaddress']) && $_SESSION['userRole'] == 'Receptionist') {
    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/style.css' ?>">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/payrollPageHead.css' ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            .next {
                position: initial;
                height: auto;
            }
        </style>
        <title>Receptionist payroll page</title>
    </head>
    <body>
    <div class="user">
        <?php include(BASEURL . '/Components/ReceptionistSidebar.php?profilePic=' . $_SESSION['profilePic'] . "&name=" . $_SESSION['name']); ?>
        <div class="userContents" id="center">
            <div class="title">
                <img src="<?php echo BASEURL . '/images/logo5.png' ?>" alt="logo">
                Royal Hospital Management System
            </div>
            <ul>
                <li class="userType"><img src=<?php echo BASEURL . '/images/userInPage.svg' ?> alt="admin">
                    Receptionist
                </li>
                <li class="logout"><a href="<?php echo BASEURL . '/Homepage/logout.php?logout' ?>">Logout
                        <img
                            src=<?php echo BASEURL . '/images/logout.svg' ?> alt="logout"></a>
                </li>
            </ul>
            <div class="arrow">
                <img src=<?php echo BASEURL . '/images/arrow-right-circle.svg' ?> alt="arrow">Payroll
            </div>
            <ul id="billInfo">
                <li id="billDetails"><a href="<?php echo BASEURL . '/Receptionist/payrollPageBill.php' ?>">Billing details</a></li>
                <li id="headDetails"><a href="<?php echo BASEURL . '/Receptionist/payrollPageHead.php' ?>">Header details</a></li>
                <li id="patientInfo"><a href="<?php echo BASEURL . '/Homepage/logout.php?logout' ?>">Patient information</a></li>
            </ul>
            <div class="wrapper">
                <div class="table">
                    <div class="row headerT">
                        <div class="cell">Particular Name</div>
                        <div class="cell">Quantity</div>
                        <div class="cell">Rate</div>
                        <div class="cell">Amount</div>
                    </div>
                    <div class="row">
                        <div class="cell"></div>
                        <div class="cell"></div>
                        <div class="cell"></div>
                        <div class="cell"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(BASEURL . '/Components/Footer.php'); ?>
    </body>
    </html>

    <?php
} else {
    header("location: " . BASEURL . "/Homepage/login.php");
}
?>
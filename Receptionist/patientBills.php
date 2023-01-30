<?php
session_start();

require_once("../conf/config.php");
if (isset($_SESSION['mailaddress']) && $_SESSION['userRole'] == 'Receptionist') {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/style.css' ?>">
        <link rel="stylesheet" href="<?php echo BASEURL . '/css/adminUsersPage.css' ?>">
        <title>Receptionist patient page - Patient</title>
        <style>
            p.royal {
                font-size: 20px;
            }

            p.addUSer {
                font-size: 30px;
            }

            .next {
                position: initial;
                height: auto;
            }
        </style>
        <script src="<?php echo BASEURL . '/js/updateUser.js' ?>"></script>

    </head>

    <body>
    <div class="user">
        <?php include(BASEURL . '/Components/ReceptionistSidebar.php?profilePic=' . $_SESSION['profilePic'] . "&name=" . $_SESSION['name']); ?>
        <div class="userContents" id="center">
            <div class="title">
                <img src="../images/logo5.png" alt="logo">
                Royal Hospital Management System
            </div>
            <ul>
                <li class="userType"><img src="../images/userInPage.svg" alt="admin">Receptionist</li>
                <li class="logout"><a href="<?php echo BASEURL . '/Homepage/logout.php?logout' ?>">Logout
                        <img src="../images/logout.svg">
                    </a></li>
            </ul>
            <div class="arrow">
                <img src="../images/arrow-right-circle.svg" alt="arrow">Patient
            </div>
            <p>
                <script src="<?php echo BASEURL . '/js/addUser.js' ?>"></script>
                <button type="button" id="addButton" onclick="displayPatientAddForm()">+Add patient</button>
            </p>

            <div class="filter">
                <input type="text" id="myInputName" onkeyup="filterByName()" placeholder="Search for names.." title="Type in a name">
            </div>

            <div class="userClass">
                <?php
                $query1 = "SELECT * FROM user where user_role = 'Patient'";
                $result1 = $con->query($query1);

                $rows = $result1->num_rows;
                ?>

                <div class="wrapper">
                    <div class="table">
                        <div class="row headerT">
                            <div class="cell">Options</div>
                            <div class="cell">Name</div>
                            <div class="cell">Patient ID</div>
                            <div class="cell">Profile Image</div>
                            <div class="cell">Patient type</div>
                        </div>
                        <?php
                        for ($j = 0; $j < $rows; ++$j) {
                            $result1->data_seek($j);
                            $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                            $query2 = "SELECT * FROM patient where nic = '".$row1['nic']."'";
                            $result2 = $con->query($query2);
                            $result2->data_seek(0);
                            $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                            ?>
                            <div class="row">
                                <div class="cell" style="100px" data-title="Options">
                                    <a href="<?php echo BASEURL . '/Receptionist/displayBills.php?id=' . $row1['nic'] ?>">
                                        <button class="edit"><img
                                                    src="<?php echo BASEURL . '/images/bill.svg' ?>" alt=" Edit">
                                            View Bills
                                        </button>
                                    </a>
                                </div>
                                <div class="cell" data-title="Name">
                                    <?php echo $row1['name']; ?>
                                </div>
                                <div class="cell" data-title="Patient ID">
                                    <?php echo $row2['patientID']; ?>
                                </div>
                                <div class="cell" style="width:100px" data-title="Profile image">
                                    <?php
                                    echo "<img class='profilePic' src='" . BASEURL . "/uploads/".$row1['profile_image']." alt='Upload Image' width=150px>";
                                    ?>
                                </div>
                                <div class="cell" data-title="Patient type">
                                    <?php echo $row2['emergency_contact']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(BASEURL . '/Components/Footer.php'); ?>

    <script src=<?php echo BASEURL . '/js/ValidatePatientAddForm.js' ?>></script>
    <script src=<?php echo BASEURL . '/js/filterElements.js' ?>></script>

    </body>

    </html>
    <?php
} else {
    header("location: " . BASEURL . "/Homepage/login.php");
}
?>
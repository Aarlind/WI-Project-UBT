<?php
session_start();
if ($_SESSION['email'] == '' && $_SESSION['password'] == '') {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet The Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/meettheteam_contact.css?v=2">
    <script src="../js/script.js?v=1"></script>
    <link rel="icon" href="../img/buytime-icon.png" type="image/icon type">

</head>

<body>
    <div>
        <div class="header">
            <div class="logodiv">
                <img id="logo" src="../img/buytime-logo.png" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><?php
                        if (isset($_SESSION['Roli']) && $_SESSION['Roli'] == 1) {
                        ?>

                            <a style="color: red;" target="_blank" class="login-a" href="../pages/dashboard.php">Dashboard</a>
                        <?php

                        }
                        ?>
                    </li>
                    <li><a class="login-a" href="../pages/index.php">Home</a></li>
                    <li><a class="login-a" href="../pages/shop.php">Shop</a></li>
                    <li><a class="login-a" href="../pages/meettheteam.php">Meet the Team</a></li>
                    <li><a class="login-a" href="../pages/contact.php">Contact</a></li>
                    <li><a class="login-a" href="logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
        <div class="meetteam">
            <p class="headers-paragraphs">Meet The Team</p>
        </div>
        <hr>
        <div class="content-div">

            <?php
            require_once '../controllers/ControllerMenu.php';
            $admins = new ControllerMenu;
            $allAdmins = $admins->readAdmins();
            for ($j = 0; $j < count($allAdmins); $j++) {
                echo '
            <div class="firstmember-div">
                <div class="img1">
                    <img class="member-images" src="' . $allAdmins[$j]['Foto'] . '" alt="">
                    <div class="firstmember-name">
                        <p class="membername">' . $allAdmins[$j]['Emri'] . " " . $allAdmins[$j]['Mbiemri'] . '</p>
                    </div>
                    <div class="firstmember-info">
                        <q>' . $allAdmins[$j]['Profesioni'] . '</q>
                    </div>
                </div>
            </div>

        ';
            }
            ?>

        </div>

        <div class="contactus">
            <br>
            <p class="contactparagraph">Contact our dependable team of professionals today.</p>
            <br>
            <button onclick="contactRedirect()" class="contactbutton">Contact Us</button>
        </div>





        <div class="footer">
            <div class="social-logos"><a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>
            <p class="footer-paragraph">
                <a href="#privacy">Privacy</a> |
                <a href="#cookie-policy">Cookie Policy</a>
                <br>
                2021 Copyright buyTime
            </p>
        </div>
    </div>
</body>

</html>
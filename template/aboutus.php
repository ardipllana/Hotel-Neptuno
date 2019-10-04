<?php 
    session_start();
    include ('../config/db_connect.php');

?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neptuno</title>
    <link href="../css/css-homepage.css" rel="stylesheet" type="text/css">
    <link href="../css/css-aboutus.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<section class="wrapper">
    <header>
        <nav class="container d-flex navbar">
            <div class="logo">
                <a href="../index.php">
                    <img class="hotel-logo" src="../assets/images/logo_hotel.png"/>
                </a>
            </div>
            <div class="spacer"></div>
            <div class="menu">
                <ul>
                    <li><a href="../index.php" >Home</a></li>
                    <li><a href="../template/aboutus.php" style="text-decoration:underline;">About us</a></li>
                    <li><a href="../template/gallery.php"> Gallery</a></li>
                    <li><a href="../template/reservation.php"> Reservation</a></li>
                    <li><a href="../template/Contact.php"> Contact us</a></li>
                    <!-- <li><a href="../template/sign-up.php"> Sign up</a></li> -->
                    <?php
                            if(!isset($_SESSION['_USERNAME']))
                             { 
                                 ?>
                                 <li><a href="sign-up.php"> Sign up</a></li>
                                 <li><a href='login.php'>Log in</a></li>
                                 <?php
                             } else{
                                 echo "<li><a href='logout.php'>Log out</a></li>";   
                             }
                     ?>
                </ul>
            </div>
            <div class="menu-icon">
                <img id="ham-icon"  src="../assets/images/hamburger-icon.png">
            </div>
        </nav>
    </header>
    <div class="container justify-content-center align-items-center">
        <div class="text">
            <h1 class="title">About us</h1>

        </div>
    </div>
</section>

<section class="section1" >
    <div class="container justify-content-center align-items-center">
        <div class="text2">
            <h2>Kitchen</h2>
            <p class="text-aboutus">Our kitchen, build with high end equippments, has one of the top chefs of the region. Our ingredients come fresh from the local farms which are 100% non-GMO. With our chef, cooking fresh and delicious food for you, we guarantee to pleasue every bit of your taste buds.</p>
            <p class="text-aboutus" >Come and enjoy our delicious food.</p>
        </div>
    </div>
</section>
<div class="section2">

</div>
<section class="section1" >
    <div class="container justify-content-center align-items-center">
        <div class="text2">
            <h2>Wellness and Spa</h2>
            <p class="text-aboutus" >Take a break and come at out Spa facility where we guarantee to have a stress free experience. Our spa includes two out-door swimming pools for the hot days of summer. One all year long indoor swimming pool and a Jacuzzi, both with constant water temperature. Take a massage from our big variety. Acupuncture, Thai massage, or take one of our wellness baths, including mud bath and chocolate baths.</p>

        </div>
    </div>
</section>
<div class="section3">

</div>
<section class="section1" >
    <div class="container justify-content-center align-items-center">
        <div class="text2">
            <h2>Staff</h2>
            <p class="text-aboutus" >We have a hard working staff who's duty is to make your stay as pleasent as possible.</p>
            <p class="text-aboutus" > We love our job, and it is our job to make you happy. Our reception is 24h a day, 7 days a week ready at your disposal. If you have any questions, feel free to contact us.</p>
        </div>
    </div>
</section>
<div class="section4">

</div>

<footer>
    <div class="footer container  d-flex">
        <div class="footer-copyright">
            <p>Copyright &copy;Neptuno Hotel </p>
        </div>
        <div class="spacer"></div>
        <div class="footer-socials destop-link">
            <a href="https://www.facebook.com/"><img class="social-icon" src="../assets/images/facebook.svg"></a>
            <a href="https://www.instagram.com/"><img class="social-icon" src="../assets/images/instagram.svg"></a>
        </div>
    </div>
</footer>
<script src="../js/homepage.js"></script>
</body>
</html>
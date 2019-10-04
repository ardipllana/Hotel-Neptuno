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
    <link href="../css/gallery.css" rel="stylesheet" type="text/css">
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
                    <li><a href="../template/aboutus.php">About us</a></li>
                    <li><a href="../template/gallery.php" style="text-decoration:underline;"> Gallery</a></li>
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
            <h1 class="title">Gallery</h1>
            <a href="#jump">
                <button type="button" class="btn">See our photos!</button>
            </a>
        </div>
    </div>
</section>


<section class="section1" id="jump">
    <div class="container justify-content-center align-items-center">
        <div class="slider">
            <h2>See more</h2>
            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 7</div>
                    <img src="../assets/images/suite.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 7</div>
                    <img src="../assets/images/room.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 7</div>
                    <img src="../assets/images/lobby.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 7</div>
                    <img src="../assets/images/bar.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">5 / 7</div>
                    <img src="../assets/images/dinner.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">6 / 7</div>
                    <img src="../assets/images/dessert.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">7 / 7</div>
                    <img src="../assets/images/night.png" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
                <span class="dot" onclick="currentSlide(6)"></span>
                <span class="dot" onclick="currentSlide(7)"></span>
            </div>
        </div>

</section>

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
<script src="../js/gallery.js"></script>

</body>
</html>
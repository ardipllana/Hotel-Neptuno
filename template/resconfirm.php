<?php 

    session_start();
    include ('../config/db_connect.php');



    
?>




<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation</title>
    <link href="../css/css-homepage.css" rel="stylesheet" type="text/css">
    <link href="../css/form-style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/reservation.js"></script>
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
                    <li><a href="../template/gallery.php"> Gallery</a></li>
                    <li><a href="../template/reservation.php" style="text-decoration:underline;"> Reservation</a></li>
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
            <h1 class="title">Reservation</h1>
        </div>
    </div>
</section>


<div class="container justify-content-center lace-color-bg">
    <div class="form-holder">

                    <div class="row">
                         <div  class="reservation"><label for="checkin">Full name: </label></div>
                            <div class="reservation">
                                <p><?php  echo $_SESSION["firstname"].' '. $_SESSION["lastname"] ?></p>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Email: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION["email"]?></p>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Phone: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION["phone"]?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Room type: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION['rooms_name']?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Price per night: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION['pricepernight']?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Check-in date: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION['check_in']?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Check-out date: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION['check_out']?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Total price: </label></div>
                            <div class="reservation">
                                <p><?php echo $_SESSION['totalprice'] ?></p>
                              <div><?php // echo $errors['check-in'] ?></div>
                            </div>
                    </div>

                   

                
    </div>
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

</body>
</html>
<script src="../js/homepage.js"></script>
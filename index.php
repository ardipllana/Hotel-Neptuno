<?php 
    
    session_start();
    include ('config/db_connect.php');

    //echo $selectUserid;
    //echo $_SESSION['user_id'];
    // write query for all floors

    //$sql = 'SELECT * FROM floors';

    // make query & get results

    //$result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array

    //$floors = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free results from memory

    //mysqli_free_result($result);

    //close connection

    //mysqli_close($conn);

    // print the array

    //print_r($floors);



?>


<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neptuno</title>
    <link href="css/css-homepage.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<section class="wrapper">
    <header>
        <nav class="container d-flex navbar">
            <div class="logo">
                <a href="index.php">
                    <img class="hotel-logo" src="assets/images/logo_hotel.png"/>
                </a>
            </div>
            <div class="spacer"></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php" style="text-decoration:underline;" >Home</a></li>
                    <li><a href="template/aboutus.php">About us</a></li>
                    <li><a href="template/gallery.php"> Gallery</a></li>
                    <li><a href="template/reservation.php"> Reservation</a></li>
                    <li><a href="template/Contact.php"> Contact us</a></li>
                    
                    <?php
                            if(!isset($_SESSION['_USERNAME']))
                             { 
                                 ?>
                                 <li><a href="template/sign-up.php"> Sign up</a></li>
                                 <li><a href='template/login.php'>Log in</a></li>
                                 
                                 <?php
                             } else{
                                 echo "<li><a href='template/logout.php'>Log out</a></li>";   
                             }
                     ?>
                </ul>
            </div>
            <div class="menu-icon">
                <img id="ham-icon"  src="assets/images/hamburger-icon.png">
            </div>
        </nav>
    </header>
    <div class="container justify-content-center align-items-center">
        <div class="text">
            <h1 class="title">Hotel NEPTUNO</h1>
            <p class="p1">We've got that you need!</p>
            <a href="#jump">
                <button type="button" class="btn">See our service!</button>
            </a>
        </div>
    </div>
</section>

<section class="section1" id="jump">
    <div class="container justify-content-center align-items-center">
        <div class="text2">
            <h2>At Your Service</h2>
        </div>
    </div>
</section>

<section class="boxes  boxes-items">

    <div class="container boxes boxes-items box-width">
        <div class="box">
            <img src="assets/images/room.png">
            <h2>Room</h2>
            <p>Nightrime is the time to heal! </p>
        </div>
        <div class="box">
            <img src="assets/images/kitchen.png">
            <h2>Kitchen</h2>
            <p>A taste of the good life!</p>
        </div>
        <div class="box">
            <img src="assets/images/mask2.png">
            <h2>Entertainment</h2>
            <p>Keep the good energy!</p>
        </div>
    </div>
</section>


<section class="section2">
    <div class="container justify-content-center align-items-center">
        <div class="text3">
            <h1 class="comma">,,</h1>
            <p>Simple made perfect!</p>
        </div>
    </div>
</section>

<section class="section3">
    <div class="container justify-content-center align-items-center">
        <div class="text4">
            <h6 class="t3p2">Kitchen   seasoned   with   love</h6>
        </div>
    </div>
</section>

<section class="boxes  boxes-items ">
    <div class="container boxes  boxes-items box-width ">
        <div class="box">
            <h2 class="bh2">64</h2>
            <p class="bp"> Rooms</p>
        </div>
        <div class="box">
            <h2 class="bh2">05</h2>
            <p class="bp">Al la Carte Restaurants</p>
        </div>
        <div class="box">
            <h2 class="bh2">04</h2>
            <p class="bp">Pools</p>
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
            <a href="https://www.facebook.com/"><img class="social-icon" src="assets/images/facebook.svg"></a>
            <a href="https://www.instagram.com/"><img class="social-icon" src="assets/images/instagram.svg"></a>
        </div>
    </div>
</footer>
<script src="js/homepage.js"></script>
</body>
</html>

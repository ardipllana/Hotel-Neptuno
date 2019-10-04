<?php 
    session_start();
    include ('../config/db_connect.php');


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'C:\xampp\composer\vendor\autoload.php';

    if (isset($_POST['submit'])) {
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // Port per gmail
    $mail->IsHTML(true);
    $mail->Username = "hotelneptuno96@gmail.com";
    $mail->Password = "Shendi12";
    $mail->SetFrom("hotelneptuno96@gmail.com");
    $mail->Subject = "Contact Form";

    $body = '<p>First Name: '.$_POST['firstname'].'</p><p>Last Name: '.$_POST['lastname'].'</p><p>Email: '.$_POST['email'].'</p><p>Gender: '.$_POST['gender'].'</p><p>Message: '.$_POST['message'].'</p>';
    $mail->Body = $body;
    $mail->AddAddress("hotelneptuno96@gmail.com");

     if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "Message has been sent";
     }

    }
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <link href="../css/css-homepage.css" rel="stylesheet" type="text/css">
    <link href="../css/form-style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/contact.js"></script>
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
                    <li><a href="../template/reservation.php"> Reservation</a></li>
                    <li><a href="../template/Contact.php" style="text-decoration:underline;"> Contact us</a></li>
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
            <h1 class="title">Contact us</h1>

        </div>
    </div>
</section>


<div class="container justify-content-center lace-color-bg">
    <div class="form-holder">
        <form action="contact.php" method="POST">
            <div class="row">
                <div class="reservation">
                    <label for="firstname">First Name</label>
                </div>
                <div class="reservation">
                    <input type="text" id="firstname" name="firstname" placeholder="Your firstname.." required>
                </div>
            </div>
            <div class="row">
                <div class="reservation">
                    <label for="lastname">Last Name</label>
                </div>
                <div class="reservation">
                    <input type="text" id="lastname" name="lastname" placeholder="Your lastname.." required>
                </div>
            </div>
            <div class="row">
                <div class="reservation">
                    <label for="email">Email</label>
                </div>
                <div class="reservation">
                    <input type="email" id="email" name="email" placeholder="Your email.." required>
                </div>
            </div>
            <div class="row">
                <div class="reservation">
                    <label>Your gender: </label>
                </div>
                <div class="reservation">
                    <input  type="radio" name="gender" value="male" checked><span> Male</span><br>
                    <input  type="radio" name="gender" value="female"> <span> Female</span><br>
                    <input type="radio" name="gender" value="other"> <span> Other</span>
                </div>
            </div>
            <div class="row">
                <div class="reservation">
                    <label for="textarea">Your message: </label></div>
                <div class="reservation">
                <textarea id= "textarea" name="message" rows="10" cols="30" required></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" name='submit' value="Submit">
            </div>
        </form>
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
<script src="../js/contact.js"></script>

<?php 

    session_start();
    include ('../config/db_connect.php');



    // write query for all room types

    $roomssql = 'SELECT * FROM rooms ORDER BY floors_id';

    // make a query & get results

    $roomsresults = mysqli_query($conn, $roomssql);

    //fetch the results

    $roomtypes = mysqli_fetch_all($roomsresults, MYSQLI_ASSOC);
    
    //free results from memory

    mysqli_free_result($roomsresults);





    $errors = array('check-in'=>'', 'check-out'=>'');

    if (isset($_POST['submit'])) {
       // echo htmlspecialchars($_POST['room-type']);
       // echo htmlspecialchars($_POST['nr-people']);
       // echo htmlspecialchars($_POST['check-in']);
       // echo htmlspecialchars($_POST['check-out']);
       // echo htmlspecialchars($_POST['username']);
       // echo htmlspecialchars($_POST['password']);



        //check check-in
        if(empty($_POST['check-in'])){
            $errors['check-in'] = 'Please select a check-in';
        } else {
            // echo htmlspecialchars($_POST['check-in']);
                    // $email = $_POST['email'];
                    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    // echo 'Email must be a valid email address ';
            $check_in = $_POST['check-in'];
            
        }


        //check check-out
        if(empty($_POST['check-out'])){
            $errors['check-out'] = 'Please select a check-out';
        } else {
            //echo htmlspecialchars($_POST['check-out']);
            $check_out = $_POST['check-out'];
        }

         //echo  $test = $_POST['room-type'];


        if((strtotime($check_out) - strtotime($check_in))/60/60/24 >0){


            $timediff = (strtotime($check_out) - strtotime($check_in))/60/60/24;

            // write query for all room types
            $pricesql = "SELECT price from rooms where id ='".$_POST['room-type']."';";
            
            // make a query & get results
            $priceresults = mysqli_query($conn, $pricesql);

            //fetch the results
            
            $row = mysqli_fetch_assoc($priceresults);

            $price = $row['price'];

    
            //free results from memory

              mysqli_free_result($priceresults);

          

            $totalprice = $price * $timediff;



            $rmsql = "SELECT name from rooms where id ='".$_POST['room-type']."';";
            
            // make a query & get results
            $rmresults = mysqli_query($conn, $rmsql);

            //fetch the results
            
            $row2 = mysqli_fetch_assoc($rmresults);

            $roomname = $row2['name'];

    
            //free results from memory

              mysqli_free_result($rmresults);


            

            //echo $totalprice;

            if(array_filter($errors)){
                //echo 'errors in form';
            } else {
                // escape sql chars
                 $check_in = mysqli_real_escape_string($conn, $_POST['check-in']);
                 $check_out = mysqli_real_escape_string($conn, $_POST['check-out']);
            
                 $_SESSION['check_in'] = $check_in;
                 $_SESSION['check_out'] = $check_out;
                 $_SESSION['pricepernight'] = $price;
                 $_SESSION['totalprice'] = $totalprice;
                 $_SESSION['rooms_id'] = $_POST['room-type'];
                 $_SESSION['rooms_name'] = $roomname;
                // create sql
                 $sql = "INSERT INTO reservation(check_in, check_out, total_price, rooms_id, users_id) VALUES('".$_SESSION['check_in']."', '".$_SESSION['check_out']."','".$_SESSION['totalprice']."' , '".$_SESSION['rooms_id']."', '".$_SESSION['user_id']."')";
                // save to db and check
                    if(mysqli_query($conn, $sql)){
                    // success
                         header('Location: resconfirm.php');
                    } else {
                         echo 'query error: '. mysqli_error($conn);
                    }
           }



        } else {
            $errors['check-in'] = 'Check out date can not be before check in date ';
        }// ----- works (nese osht neg, end date osht before start date)

        




    }
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




        <?php
            if(!isset($_SESSION['_USERNAME']))
                { 
                    ?>
                                <div class="row">
                            <div class="reservation" ><label for="checkout"></label></div>
                            <div >
                                <h2>You need to be signed in to make a reservation!</h2>
                                <div class="reservation" ><label for="checkout"></label></div>
                                <h3><a href="login.php" >Click here</a> to log in!</h3>
                                <div class="reservation" ><label for="checkout"></label></div>
                                <h3>No account? <a href="sign-up.php" >Sign up here!</a></h3>
                            </div>
                    </div>
                    <?php
                } else{
                    ?>

                    <form action="reservation.php" method="POST">
                        <div class="row">
                            <div class="reservation">
                            <label for="roomtype">Your room type: </label>
                            </div>
                           <div class="reservation">
                                <select id="roomtype" name="room-type">

                                  <?php 
                                   // $indx = 1;
                                  foreach ($roomtypes as $roomtype) {  

                                        echo '<option value="'.$roomtype['id'].'">' .$roomtype['name'].' </option>';

                                      } ?>

                                </select>
                            </div>
                     </div>
           
                    <div class="row">
                         <div  class="reservation"><label for="checkin">Check-in time: </label></div>
                            <div class="reservation">
                                <input id="checkin" type="date" name="check-in">
                              <div><?php echo $errors['check-in'] ?></div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="reservation" ><label for="checkout">Check-out time: </label></div>
                            <div class="reservation">
                            <input id="checkout" type="date" name="check-out">
                            <div><?php echo $errors['check-out'] ?></div>
                            </div>
                    </div>
                   

                    <div class="row">
                            <input type="submit" name='submit' value="Submit">
                    </div>

                    </form>

                    <?php 
                }
        ?>
        
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
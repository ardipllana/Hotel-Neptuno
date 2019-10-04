<?php 
    
	session_start();
    include ('../config/db_connect.php');

	$firstname = $lastname = $email = $phone = $username = $password = '';

    $errors = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'phone'=>'', 'username'=>'', 'password'=>'');

    if (isset($_POST['submit'])) {
       // echo htmlspecialchars($_POST['room-type']);

        //check firstname
        if(empty($_POST['firstname'])){
            $errors['firstname'] = 'Please type your first name ';
        } else {
                 $firstname = $_POST['firstname'];

                 if(!preg_match('/^[a-zA-Z\s]+$/', $firstname)){
                 $errors['firstname'] = 'Must be a valid first name ';
            	 }
        }

        //check lastname
        if(empty($_POST['lastname'])){
            $errors['lastname'] = 'Please type your last name ';
        } else {
                 $lastname = $_POST['lastname'];

                 if(!preg_match('/^[a-zA-Z\s]+$/', $lastname)){
                 $errors['lastname'] = 'Must be a valid last name ';
            	 } 
        }



        //check email
        if(empty($_POST['email'])){
            $errors['email'] = 'Please type your email ';
        } else {
                 $email = $_POST['email'];

                 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 $errors['email'] = 'Must be a valid email address ';
            	 }
              }

        //check phone
        if(empty($_POST['phone'])){
            $errors['phone'] = 'Please type your phone ';
        } else {
                 
                 $phone = $_POST['phone'];

                 if(!preg_match("/([+]?\d{1,3}[\/.-\s]?)?(\d{2,3}[\/.-\s]?){2,3}\d{2,4}/", $phone)){
                 $errors['phone'] = 'Must be a valid phone number, can include +, - and .';
            	 } 
        }





        //check username
        if(empty($_POST['username'])){
            $errors['username'] = 'Please type your username ';
        } else {
            //echo htmlspecialchars($_POST['username']);
            $username = $_POST['username'];

            if(!preg_match('/^(?=.{3,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $username)){
                 $errors['username'] = 'Must be a valid username (min.3 char - max.20';
            	 } 
            
        }


        //check password
        if(empty($_POST['password'])){
            $errors['password'] = 'Please type your password ';
        } else {
            //echo htmlspecialchars($_POST['password']);
            $password = $_POST['password'];

            if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/', $password)){
                 $errors['password'] = 'Passowrd must be minimum six characters, at least one letter and one number ';
            	 } 

        }


        if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
			$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			// create sql
			$sql = "INSERT INTO users(firstname, lastname, email, phone, username, password, roles_id) VALUES('$firstname', '$lastname', '$email', '$phone', '$username', '$password', 2)";
			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: ../index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
			
		}


    }
?>




<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
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
                    <li><a href="aboutus.php">About us</a></li>
                    <li><a href="gallery.php"> Gallery</a></li>
                    <li><a href="reservation.php"> Reservation</a></li>
                    <li><a href="Contact.php"> Contact us</a></li>
                    
                    <?php
                            if(!isset($_SESSION['_USERNAME']))
                             { 
                                 ?>
                                 <li><a href="sign-up.php" style="text-decoration:underline;"> Sign up</a></li>
                                 <li><a href='login.php'>Log In</a></li>
                                 <?php
                             } else{
                                 echo "<li><a href='logout.php'>Log Out</a></li>";   
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
            <h1 class="title">Create an account</h1>
        </div>
    </div>
</section>


<div class="container justify-content-center lace-color-bg">
    <div class="form-holder">
        <form action="sign-up.php" method="POST">

            <div class="row">
                <div class="reservation">
                    <label for="firstname">First Name</label>
                </div>
                <div class="reservation">
                    <input type="text" id="firstname" name="firstname" placeholder="Your name.." required>
                    <div><?php echo $errors['firstname'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="reservation">
                    <label for="lastname">Last Name</label>
                </div>
                <div class="reservation">
                    <input type="text" id="lastname" name="lastname" placeholder="Your last name.." required>
                    <div><?php echo $errors['lastname'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="reservation">
                    <label for="email">Email</label>
                </div>
                <div class="reservation">
                    <input type="text" id="email" name="email" placeholder="Your email.." required>
                    <div><?php echo $errors['email'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="reservation">
                    <label for="phone">Phone</label>
                </div>
                <div class="reservation">
                    <input type="text" id="Phone" name="phone" placeholder="Your Phone.." required>
                    <div><?php echo $errors['phone'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="reservation">
                    <label for="username">User Name</label>
                </div>
                <div class="reservation">
                    <input type="text" id="username" name="username" placeholder="Your username.." required>
                    <div><?php echo $errors['username'] ?></div>
                </div>
            </div>

            <div class="row">
                <div class="reservation">
                    <label for="password">Password</label>
                </div>
                <div class="reservation">
                    <input type="password" id="password" name="password" placeholder="Your password.." required>
                    <div><?php echo $errors['password'] ?></div>
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


<script type="text/javascript">
    var liber {
        
    }
</script>
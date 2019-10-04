<?php session_start(); ?>
<?php 
include ('../config/db_connect.php');


if (isset($_POST['username']) && isset($_POST['password']) )
{
                  $usernameLogin = $_POST['username'];
                  $passwordLogin = $_POST['password'];
              
if  (!empty($usernameLogin) || !empty($passwordLogin)) 
                  {
                      
                  // i kena rujt nvariabla inputat
                    $_username=mysqli_real_escape_string($conn,$usernameLogin); //qetu nuk lejojm SQL Injection
                    $_password=mysqli_real_escape_string($conn,$passwordLogin);


                    $selectUsername = $conn->query("SELECT username from users where username ='".$_username."';");
                    $selectPassword = $conn->query("SELECT password from users where password ='".$_password."';");
                    $selectUserid = $conn->query("SELECT id from users where username ='".$_username."';");
                    $selectUserrole = $conn->query("SELECT * from users where username ='".$_username."';");

                    $sql_query = "SELECT * from users where username like '$_username' and password like '$_password';";

                      $result = mysqli_query($conn, $sql_query);

                      if(mysqli_num_rows($result) > 0 ){

                       $row = mysqli_fetch_assoc($result);
                       $name = $row["username"]; 
                       $user_id =  $row['id'];
                       $user_roles =  $row['roles_id'];

                       //using session
                       $_SESSION["user_id"] = $user_id;
                       $_SESSION["user_roles"] = $user_roles;
                       $_SESSION["firstname"] = $row['firstname'];
                       $_SESSION["lastname"] = $row['lastname'];
                       $_SESSION["email"] = $row['email'];
                       $_SESSION["phone"] = $row['phone'];
                       }
                    
                    



                  if  (( $selectUsername->num_rows > 0) &&( $selectPassword->num_rows > 0)) 
                      {
                        if (!isset($_COOKIE["logged"]))
                        {
                         // session_start();
                          $_SESSION['_USERNAME']=$usernameLogin;
                          
                          setcookie("logged", $usernameLogin, time() + (86400 * 30));
                            echo
                            "
                            <script>
                              location.replace('http://localhost/hotel-neptuno/');
                              </script>
                            ";
                        }


                      }

                  else 
                  {
                      echo 
                       "<script>
                          document.getElementById('loginError').innerHTML = 'Keni shenuar te dhenat gabim';
                          document.getElementById('loginError').style.display = 'block';
                       </script>"; 
                  }
                    
                }
            }


?>

<!DOCTYPE html>
<html>
<head>

  <link href="../css/login.css" rel="stylesheet" type="text/css">

  <title>Log In</title>
</head>
<body>

<!--   <form method="POST"> -->

  <div class="wrapper fadeInDown">
   <div id="formContent">
    <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>

    <!-- Icon -->
      <div class="fadeIn first">
        <img src="../assets/images/logo_hotel.png" id="icon" alt="User Icon" />
      </div>

    <!-- Login Form -->
      <form action="login.php" method="POST">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
        <input type="submit" class="fadeIn fourth" name="submit" value="Log In">
        <label id="loginError" style="display: none;"></label>
      </form>

    <!-- Remind Passowrd -->

    </div>
  </div>

<!--   </form> -->




</body>
</html>





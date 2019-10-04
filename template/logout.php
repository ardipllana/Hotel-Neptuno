<?php
$cookie= $_COOKIE['logged']; 

include ('../config/db_connect.php');
session_start();
session_destroy();
unset($_SESSION['_USERNAME']);
session_destroy();
setcookie("logged", $cookie, time() - 1, "");
echo
                            "

                            <script>
                              location.replace('http://localhost/hotel-neptuno/');
                            
                              </script>
                            ";
?>
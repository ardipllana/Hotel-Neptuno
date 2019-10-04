<?php 
	
	// // connect to db
 //    $conn = mysqli_connect('localhost', 'ardi', 'Shendi12', 'hotel_neptuno');

 //    // check connection
 //    if(!$conn){
 //        echo 'Connection error: ' . mysqli_connect_error();  
 //    }


//connect to db 
 
$conFirst = new dbConnect('localhost', 'ardi', 'Shendi12', 'hotel_neptuno');

$conn=$conFirst->conn;


class dbConnect{
	public $conn;
	function __construct (string $host,string $username,string $password, string $dbName){

		$this->conn = mysqli_connect($host, $username, $password, $dbName);

		if(!$this->conn){
	    echo 'Connection error: ' . mysqli_connect_error();
		}

	}

	public function mbyllLidhjenDB(){
	  $this->con = null;
	}
	
}


    
?>
<?php
// if you use a different port, please use that port number
$con=mysqli_connect("localhost:3307","user1","pass1","directorydb");

// Check connection
if (mysqli_connect_errno())
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

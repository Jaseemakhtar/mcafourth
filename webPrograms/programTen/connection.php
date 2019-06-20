<?php
   $server = "localhost";
   $username = "root";
   $password = "jaseem";
   $conn = mysqli_connect($server, $username, $password);
   if (!$conn) {
       die("Connection failed: " . mysqli_error($conn));
   }
?>

<?php
   $server = "localhost";
   $username = "root";
   $password = "root";
   $conn = mysqli_connect($server, $username, $password);
   if (!$conn) {
       die("Connection failed: " . $conn->connect_error);
   }
?>

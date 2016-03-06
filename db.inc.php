<?php
  $hostname = "localhost";
  $username = "root";
  $password = "project";
  $dbname = "JRVM";
  $con = mysqli_connect($hostname, $username, $password, $dbname); // Create conection
  if (!$con) { // Check conection
    echo "Failed to connect to MySQL: " . mysqli_conect_error();
  }
?>
<?php
  include 'db.inc.php';
  $q = intval($_GET['q']);
  $sql="SELECT * FROM persons WHERE personid = '".$q."'";
  $result = mysqli_query($con,$sql);
  while($row = mysqli_fetch_array($result)) {
    echo "Person ID:\t " . $row['personid'] . "\n";
    echo "First Name:\t " . $row['firstname'] . "\n";
    echo "Surname:\t " . $row['lastname'] . "\n";
    echo "Date of Birth:\t " . $row['dob'];
  }
  mysqli_close($con);
?>
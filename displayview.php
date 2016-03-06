<?php
  SESSION_start();
  include 'db.inc.php';
  
  $sql="SELECT * FROM persons WHERE personid = " . $_POST['catId'];
  
  if (!$result = mysqli_query($con,$sql)) {
    die('Error in querying the database' . mysqli_error());
  }
  $rowcount = mysqli_affected_rows($con);
  $_SESSION['catId']=$POST['catId'];
  if ($rowcount == 1) {
    $row = mysqli_fetch_array($result); 
    $_SESSION['catId']=$row['personid'];
    $_SESSION['costPerDay']=$row['firstname'];
    $_SESSION['fiveDayDisc']=$row['lastname'];
    $_SESSION['tenDayDisc']=$row['dob'];
  }
  else if ($rowcount == 0) {
    $row = mysqli_fetch_array($result); 
    $_SESSION['catId']='';
    $_SESSION['costPerDay']='';
    $_SESSION['fiveDayDisc']='';
    $_SESSION['tenDayDisc']='';
    unset ($_SESSION['catId']);
    unset ($_SESSION['costPerDay']);
    unset ($_SESSION['fiveDayDisc']);
    unset ($_SESSION['tenDayDisc']);
    echo "No matching records";
  }
  mysqli_Close($con);
  // GO back to the calling form - with the values that we need to displays in _SESSION variables,
  // if a record was found
  header('Location: deleteCategory.php');
  // or alternatively use th efollowing
  echo "<script>window.location.href='view.html.php'</script>";
?>
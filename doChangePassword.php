<?php
/**
 * Created by IntelliJ IDEA.
 * User: jerryshao
 * Date: 29/02/16
 * Time: 11:25
 */
    require_once 'functions.php';
    session_start();

    $username = $_SESSION['username'];
    $pre_password = md5($_POST['pre_password']);
    $password = md5($_POST['password']);
    $conn = getConnection();
    $sql = "SELECT Password FROM Employee WHERE Username = '" . $username . "';";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    if($pre_password == $row['Password']) {
        // correct
        $updateSQL = "UPDATE Employee SET Password = '" . $password . "' WHERE UserName = '" . $username . "';";
        if(mysqli_query($conn, $updateSQL)) {
            header("Location: changePassword.php?error_message=true");
        }
    } else {
        // return error message: previous message doesn't match
        header("Location: changePassword.php?error_message=false");
    }

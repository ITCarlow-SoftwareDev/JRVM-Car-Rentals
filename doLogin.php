<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Allow user login.
 * Bug:
 */
    require_once 'functions.php';

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = getConnection();
    $sql = "SELECT count(EmployeeID) AS 'count' FROM Employee WHERE UserName = '" . $username . "' AND Password = '" . md5($password) ."';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['count'];

    if ($row['count'] == 1) {
        $_SESSION['username'] = $username;
        header("location: rental.php");
    } else {
        $usernameSQL = "SELECT count(EmployeeID) AS 'count' FROM Employee WHERE  Username = '" . $username .  "';";
        $result = mysqli_query($conn, $usernameSQL);
        $row = mysqli_fetch_array($result);

        if($row['count'] == 1) {
            // Password is not correct.
            header("location: index.php?error_message=2");
        } else {
            // Username doesn't exist.
            header("location: index.php?error_message=1");
        }

    }
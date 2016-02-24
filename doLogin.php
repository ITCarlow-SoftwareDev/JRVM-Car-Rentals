<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jerryshao
 * Date: 16/2/24
 * Time: 00:33
 */
    require_once 'functions.php';

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = getConnection();
    $sql = "SELECT count(EmployeeID) AS 'count' FROM Employee WHERE UserName = '" . $username . "' AND Password = '" . $password ."';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo $row['count'];

    if ($row['count'] == 1) {
        $_SESSION['username'] = $username;
        header("location: rental.php");
    } else {
        header("location: index.php?error_message=1");
    }
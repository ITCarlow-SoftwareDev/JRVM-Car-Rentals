<?php
/**
 * Created by PhpStorm.
 * User: Jerryshao
 * Date: 16/4/3
 * Time: 10:17
 */

    require_once 'functions.php';
    $companyName = $_GET['company'];
    $sql = "DELETE FROM Company WHERE CompanyName = '" . $companyName . "'";
    $conn = getConnection();

    if (!mysqli_query($conn, $sql)) {
        die("error message: ". mysqli_errno($conn));
        header("location: /deleteCompany.php?delete=false");
    } else {
        // delete successful
        header("location: /deleteCompany.php?delete=true&companyName=" . $companyName);
    }
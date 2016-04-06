<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Delete a company.
 * Bug:
 */

    require_once 'functions.php';
    $companyInfo = explode(",", $_POST['company']);
    $companyName = $companyInfo[0];
    $sql = "DELETE FROM Company WHERE CompanyName = '" . $companyName . "'";
    $conn = getConnection();

    echo $companyName;

    if (!mysqli_query($conn, $sql)) {
        die("error message: ". mysqli_errno($conn));
        header("location: /deleteCompany.php?delete=false");
    } else {
        // delete successful
        header("location: /deleteCompany.php?delete=true&companyName=" . $companyName);
    }
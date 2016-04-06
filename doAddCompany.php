<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Add a new company into database.
 * Bug:
 */
    require_once "functions.php";

    $conn = getConnection();
    $companyName = $_POST['companyName'];
    $street= $_POST['street'];
    $town = $_POST['town'];
    $county = $_POST['county'];
    $telephoneNumber = $_POST['telephoneNumber'];
    $creditLimit = $_POST['creditLimit'];

    $sql = "INSERT INTO Company(CompanyName, Street, Town, County, PhoneNo, CreditLimit) VALUES ('"
        . $companyName . "', '" . $street . "', '" . $town . "', '" . $county . "', '" . $telephoneNumber . "', '" . $creditLimit . "');";

    if(mysqli_query($conn, $sql)) {
        // Insert successful.
        header("location: addCompany.php?insert=true");
    } else {
        header("location: addCompany.php?insert=false");
        die("Could not insert into database" . mysqli_error($conn));
    }

    mysqli_close($conn);
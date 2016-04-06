<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Amend the company info.
 * Bug:
 */
    require_once 'functions.php';

    $sql = "UPDATE Company SET Street = '" . $_GET['street'] . "', Town = '" . $_GET['town'] . "', County = '" . $_GET['county'] . "', PhoneNo = '" . $_GET['telephoneNo'] . "', CreditLimit = '" . $_GET['creditLimit'] . "' WHERE CompanyName = '" . $_GET['companyName'] . "'";
    $conn = getConnection();

    if(!($result = mysqli_query($conn,$sql))) {
        header("location: amendCompany.php?update=false");
        die("sql script:" . mysqli_error($conn));
    } else {
        header("location: amendCompany.php?update=true");
    }


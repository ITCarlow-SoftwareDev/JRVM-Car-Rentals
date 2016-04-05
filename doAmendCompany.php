<?php
/**
 * Created by PhpStorm.
 * User: Jerryshao
 * Date: 16/4/5
 * Time: 00:29
 */
    require_once 'functions.php';

    $sql = "UPDATE Company SET Street = '" . $_GET['street'] . "', Town = '" . $_GET['town'] . "', County = '" . $_GET['county'] . "', PhoneNo = '" . $_GET['telephoneNo'] . "', CreditLimit = '" . $_GET['creditLimit'] . "' WHERE CompanyName = '" . $_GET['companyName'] . "'";
//    $sql = "update Company set Street = '" . $street . "', Town = '" . $town . "', County = '" . $county . "', PhoneNo = '" . $telephoneNo . "', CreditLimit = '" . $creditLimit . "' where CompanyName = '" . $companyName . "'";
    $conn = getConnection();

    echo $sql;

    if(!($result = mysqli_query($conn,$sql))) {
        header("location: amendCompany.php?update=false");
        die("sql script:" . mysqli_error($conn));
    } else {
        header("location: amendCompany.php?update=true");
    }


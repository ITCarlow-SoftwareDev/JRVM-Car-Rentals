<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jerryshao
 * Date: 16/2/25
 * Time: 00:27
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
        header("location: addCompany.php");
    } else {
        die("Could not insert into database" . mysqli_error($conn));
    }

    mysqli_close($conn);
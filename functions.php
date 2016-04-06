<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Public function for getting database connections.
 * Bug:
 */
    require_once 'config.php';

    // Get the database connection and return the session.
    function getConnection() {
        $conn = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DBNAME);
        if ($conn) {
            return $conn;
        } else {
            die("Cannot connect to target database.");
        }
    }

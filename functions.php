<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jerryshao
 * Date: 16/2/24
 * Time: 00:53
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

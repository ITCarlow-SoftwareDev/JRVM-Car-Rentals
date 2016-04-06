<?php
/**
 * Student Name: MINGJIE SHAO
 * Student ID: C00188468
 * Date: 30-03-2016
 * Purpose: Allow user logout.
 * Bug:
 */
    session_start();

    if (session_destroy()) {
        header("location: index.php");
    }
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jerryshao
 * Date: 2016/2/24
 * Time: 10:43
 */


    session_start();

    if (session_destroy()) {
        header("location: index.php");
    }
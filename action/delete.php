<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    $idc=$_GET['idc'];
$date=$_GET["date"];


//prepare and initialize sql
    include_once "db-act.php";
    include_once "functions.php";
deleteTerm($idc, $date, $conn);